FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_sqlite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN cp .env.example .env

RUN php artisan key:generate

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}