FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libgd-dev \
    libexif-dev \
    unzip \
    git \
    && docker-php-ext-install zip gd exif pdo pdo_mysql

RUN pecl install grpc && docker-php-ext-enable grpc

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --optimize-autoloader --no-dev --no-scripts --no-interaction --ignore-platform-reqs

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=$PORT