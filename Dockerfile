FROM php:8.1

# INSTALL XDEBUG
RUN pecl install xdebug-3.1.1 && docker-php-ext-enable xdebug