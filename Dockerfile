# Official PHP 8.2 CLI image — sufficient for running `php artisan serve`,
# which is the simplest way to satisfy "listen on 0.0.0.0:$PORT" without
# adding Nginx/PHP-FPM complexity for a demo-scale deployment.
FROM php:8.2-cli

# System libraries required to compile the PHP extensions below.
# libpq-dev is required specifically for pdo_pgsql.
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

# Composer, copied directly from its official image rather than
# curl-piping an install script.
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy the application source. .dockerignore controls what's excluded
# (notably vendor/ and .env — see .dockerignore).
COPY . .

# Install PHP dependencies for production; no dev tooling, optimized
# autoloader for faster boot.
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Laravel needs to write to these at runtime (logs, compiled views,
# sessions, cache).
RUN chmod -R 775 storage bootstrap/cache

# Defensive: clear any config/route/view cache that may have been
# generated during `composer install` against build-time (incomplete)
# environment values, so nothing stale is baked into the image.
RUN php artisan config:clear || true

# Informational only — Render supplies the real $PORT at runtime; the
# actual bind happens in CMD below.
EXPOSE 8080

# Re-cache config at container START (not at build time), because
# Render's real environment variables (DB credentials, APP_KEY, etc.)
# only exist once the container is actually running — caching them
# earlier would bake in missing/placeholder values. Then start Laravel
# bound to 0.0.0.0 on Render's assigned $PORT.
CMD php artisan migrate --force && php artisan config:cache && php artisan serve --host=0.0.0.0 --port=$PORT
