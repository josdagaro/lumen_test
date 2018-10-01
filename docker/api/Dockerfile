FROM php:7.2-apache

RUN apt update -y \
    && apt install -y \
    libpq-dev \
    libmemcached-dev \
    zlib1g-dev \
    && docker-php-ext-install \
    mbstring \
    pdo_pgsql \
    pdo \
    pgsql

RUN curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
    && mkdir -p /usr/src/php/ext/memcached \
    && tar -C /usr/src/php/ext/memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
    && docker-php-ext-configure memcached \
    && docker-php-ext-install memcached \
    && rm /tmp/memcached.tar.gz \
    && a2enmod rewrite \
    && a2enmod headers
