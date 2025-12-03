FROM php:8.1-fpm

# System dependencies
RUN apt update && apt install -y \
    git \
    curl \
    unzip \
    default-mysql-client \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    && docker-php-ext-install gd pdo_mysql zip

# Composer install
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

WORKDIR /var/www
