FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

RUN docker-php-ext-install pdo_mysql
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini


WORKDIR /var/www/app
