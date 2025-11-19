FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql opcache zip \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install xdebug 
RUN docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY 90-xdebug.ini "${PHP_INI_DIR}/conf.d"

COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite