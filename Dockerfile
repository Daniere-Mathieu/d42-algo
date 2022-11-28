# je prend une image depuis docker hub contenant php 8.0 et apache
FROM php:8.0-apache
# je run a l'interieur du docker une mis a jour du gestionnaire de paquets ainsi que l'installation des module pdo
RUN apt-get update && docker-php-ext-install pdo pdo_mysql
# je run la commande a2enmod rewrite que permet a apache de faire de la réécriture d'url
RUN a2enmod rewrite
# je crée le dossier /var/log/classroom
RUN mkdir /var/log/classroom
# je donne les droits a mon groupe apache pour le dossier des log crée si dessus
RUN chown -R www-data:www-data /var/log/classroom
# je copie le code vers /var/www/html dans mon conteneur
COPY ./src /var/www/html/
# j'expose le port 80
EXPOSE 80