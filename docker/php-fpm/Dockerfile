FROM php:8.2-fpm
LABEL authors="bennysun"

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    curl \
    bash

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install XDebug
RUN pecl install xdebug-3.3.0 \
    && docker-php-ext-enable xdebug

# Copy Xdebug configuration file
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Set working directory
WORKDIR /var/www/html
