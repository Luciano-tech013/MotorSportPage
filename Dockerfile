# Usar una imagen base de Apache con PHP
FROM php:8.1-apache

# Habilitar mod_rewrite (para el uso de .htaccess y las rutas de tu router)
RUN a2enmod rewrite

# Copiar el proyecto al contenedor
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80