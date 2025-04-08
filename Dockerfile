# Usar una imagen base de Apache con PHP
FROM php:8.1-apache

# Habilitar mod_rewrite e instalar pdo_mysql
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql

# Copiar el resto del proyecto
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80
