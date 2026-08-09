# ============================================================
# Stage 1: Build Vite frontend assets
# ============================================================
FROM node:18 AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm ci

COPY resources ./resources
COPY vite.config.js ./
COPY tailwind.config.js ./
COPY postcss.config.js ./
COPY public ./public

RUN npm run build

# ============================================================
# Stage 2: Laravel application
# ============================================================
FROM php:8.2-cli

# System libraries and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        mbstring \
        xml \
        zip \
        bcmath \
        gd \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy Laravel application
COPY . .

# Install PHP dependencies
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Copy the Vite production build generated in Stage 1
COPY --from=frontend /app/public/build ./public/build

# Laravel runtime directories must be writable
RUN chmod -R 775 storage bootstrap/cache

# Clear any build-time Laravel config cache
RUN php artisan config:clear || true

EXPOSE 8080

# Render runtime
#
# 1. Run database migrations
# 2. Cache Laravel configuration using Render environment variables
# 3. Start Laravel on Render's assigned port
CMD php artisan migrate --force && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=$PORT

