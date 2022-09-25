FROM php:8.1-fpm

WORKDIR /var/www

RUN apk update && apk add \
    build-base

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql


EXPOSE 9000
