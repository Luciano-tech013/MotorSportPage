# Usar una imagen base de Apache con PHP
FROM php:8.1-apache

# Habilitar mod_rewrite e instalar pdo_mysql
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql

# Permitir .htaccess (y rewrite) en /var/www/html. Evita el error de Permiso denegado en el servidor
RUN sed -i 's|AllowOverride None|AllowOverride All|' /etc/apache2/apache2.conf

# Copiar punto de entrada de la app en apache
COPY ./public /var/www/html

# Copiar el resto del proyecto a una carpeta no accesible desde la WEB (mayor seguridad)
COPY ./src /var/www/src

# Copiar la configuracion del virtual host dentro de Apache
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Establece el directorio de trabajo para comandos que se ejecuten en el contenedor
WORKDIR /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Reiniciar Apache
CMD ["apache2ctl", "-D", "FOREGROUND"]

