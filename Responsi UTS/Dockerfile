FROM php:7.4-apache

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
# RUN a2enmod rewrite

RUN apt-get -y update \
    && apt-get install -y libicu-dev \
    && docker-php-ext-install intl mysqli pdo_mysql

CMD ["apache2-foreground"]