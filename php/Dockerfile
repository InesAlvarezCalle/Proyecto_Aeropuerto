FROM php:8.4-fpm

# Instalar las dependencias necesarias 
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    libonig-dev \
    libssl-dev \
    libmongoc-1.0-0 \
    libjemalloc2 \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP necesarias (como PDO y MySQL)
RUN docker-php-ext-install pdo pdo_mysql xml ctype zip 

# Habilitar xdebug
# RUN docker-php-ext-enable xdebug

# Instalamos Composer, gestor de dependencias de PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalamos Xdebug (opcional)
# RUN pecl install xdebug 
#    && docker-php-ext-enable xdebug

# Opcional: Definir directorio de trabajo
WORKDIR /var/www/html


# Configuración de PHP
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Instalación opcional de MongoDB
# RUN pecl install mongodb \
#    && docker-php-ext-enable mongodb

# Establecer la ruta de trabajo
WORKDIR /var/www/html

RUN mkdir -p /var/www/html/logs \
    && chown -R www-data:www-data /var/www/html/logs