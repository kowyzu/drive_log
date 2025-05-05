FROM php:8.3-apache

# Install MySQL PDO extension
RUN docker-php-ext-install pdo pdo_mysql