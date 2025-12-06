<<<<<<< HEAD
FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzip-dev \
    zip unzip git curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

WORKDIR /app
COPY . .

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN composer clear-cache
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 8080
CMD php artisan serve --host=0.0.0.0 --port=8080
=======
FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzip-dev \
    zip unzip git curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

WORKDIR /app
COPY . .

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN composer clear-cache
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 8080
CMD php artisan serve --host=0.0.0.0 --port=8080
>>>>>>> b3e643b8a5845a94c6bb9d6921af0f015b9758e8
