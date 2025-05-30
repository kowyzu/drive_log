FROM php:8.3-apache


COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

RUN docker-php-ext-install pdo pdo_mysql