# ---------- Frontend build ----------
FROM node:20 AS frontend

WORKDIR /var/www/html

COPY package*.json ./
RUN npm install

COPY resources ./resources
COPY vite.config.js ./
COPY public ./public

RUN npm run build


# ---------- Laravel application ----------
FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring xml zip bcmath gd \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy compiled Vite assets from frontend build
COPY --from=frontend /var/www/html/public/build ./public/build

RUN chmod -R 775 storage bootstrap/cache

RUN php artisan config:clear || true

EXPOSE 8080

CMD php artisan migrate --force && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=$PORT