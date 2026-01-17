FROM php:8.3-apache

ARG UID=1000
ARG GID=1000

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    libzip-dev \    
    && docker-php-ext-install pdo pdo_pgsql zip

RUN groupadd -g $GID dockergroup \
    && useradd -u $UID -g dockergroup -m userapp

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

RUN service apache2 restart 

RUN chown -R userapp:dockergroup /var/www/html /var/run/apache2 /var/log/apache2

USER userapp

ENV PATH="$PATH:/usr/local/bin"

EXPOSE 80