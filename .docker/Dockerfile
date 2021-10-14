FROM php:7.4.1-apache

USER root

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    zip \
    sudo \
    curl \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install exif \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-enable exif \
    && docker-php-source delete

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite && a2enmod ssl

EXPOSE 80
# EXPOSE 443

# #  openssl req -new -newkey rsa:4096 -days 3650 -nodes -x509 -subj "/C=ES/ST=BALEARIC/L=PALMA/O=bidari/CN=bemysteryguest-local.com" -keyout ./ssl.key -out ./ssl.crt

# COPY .docker/sslcert/ssl.crt /etc/apache2/ssl/ssl.crt
# COPY .docker/sslcert/ssl.key /etc/apache2/ssl/ssl.key
