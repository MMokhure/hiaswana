FROM php:8.2-cli

# Install system dependencies including PostgreSQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzip-dev \
    zip unzip git curl \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring zip exif pcntl bcmath gd

WORKDIR /app

COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Install dependencies
RUN composer clear-cache \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 8080
ENV PORT=8080

COPY wait-for-db.sh /app/wait-for-db.sh
RUN chmod +x /app/wait-for-db.sh

CMD ["/app/wait-for-db.sh"]
