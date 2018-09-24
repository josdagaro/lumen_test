FROM php:7.2-apache

RUN apt update -y \
    && apt install -y \
    libpq-dev \
    && docker-php-ext-install \
    mbstring \
    pdo_pgsql \
    pdo \
    pgsql
