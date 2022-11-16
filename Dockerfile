FROM php:8.0-apache
RUN apt-get update && docker-php-ext-install pdo pdo_mysql mysqli
#RUN a2enmod rewrite
COPY . /var/www/html/
EXPOSE 80