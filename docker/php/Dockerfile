FROM php:8.1-fpm-alpine

# System dependencies
RUN apk update && apk add --no-cache \
    git \
    curl \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    zip \
    mariadb-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql zip

# Composer install (パスを /usr/bin/composer に修正)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
