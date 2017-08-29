FROM php:7-fpm-alpine

RUN apk update && \
    apk add git unzip && \
    docker-php-ext-install pdo_mysql && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install && \
    vendor/bin/doctrine orm:generate-proxies

VOLUME /var/www/html

ENTRYPOINT /var/www/html/docker/entrypoint.sh
