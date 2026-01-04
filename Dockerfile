FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    libzip-dev \    
    && docker-php-ext-install pdo pdo_pgsql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV PATH="$PATH:/usr/local/bin"

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

RUN service apache2 restart 

EXPOSE 80