# ---- Etapa de construcción (builder) ----
FROM composer:2 AS builder

# Directorio de trabajo en la etapa de construcción
WORKDIR /app

# Copiar solo los archivos necesarios para instalar dependencias
COPY composer.json composer.lock ./

# Copiar el directorio root del proyecto en el directorio de trabajo del contenedor
COPY public/ ./public

# Copiar el proyecto completo en el directorio de trabajo del contenedor
COPY src/. ./src

# Instalar dependencias
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --prefer-dist

# ---- Etapa final ----
FROM php:8.1-apache

# Instalar dependencias del sistema y extensiones PHP
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Habilitar mod_rewrite y configurar Apache
RUN a2enmod rewrite && \
    sed -i 's|AllowOverride None|AllowOverride All|g' /etc/apache2/apache2.conf

# Copiar todo el proyecto desde la etapa de construcción
COPY --from=builder /app/public /var/www/html/public
COPY --from=builder /app/src /var/www/src
# Acá están las librerías descargadas  
COPY --from=builder /app/vendor /var/www/src/vendor

# Configurar virtual host
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Dar permisos al usuario de Apache para acceder a los archivos del proyecto
RUN chown -R www-data:www-data /var/www

# Establecer permisos y directorio de trabajo
WORKDIR /var/www/html
EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]

# La etapa `builder` utiliza la imagen de Composer para instalar las dependencias y 
# luego copia solo el directorio `vendor` a la imagen final. Esto asegura que la imagen final 
# no incluya Composer ni herramientas innecesarias, reduciendo su tamaño y mejorando la seguridad.