FROM php:8.0-apache

# Instalar dependências do PHP e do PostgreSQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Copiar arquivos da aplicação
COPY . /var/www/html

# Definir diretório de trabalho
WORKDIR /var/www/html

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

# Rodar como www-data
USER www-data

CMD ["apache2-foreground"]
