# Use PHP 8.4 FPM (latest)
FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzip-dev \
    zip unzip git curl \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring zip bcmath gd

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install PHP dependencies (production)
RUN composer clear-cache \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Permissions for Laravel storage & cache
RUN chmod -R 777 storage bootstrap/cache

# Expose app port
EXPOSE 8080
ENV PORT=8080

# Copy wait script
COPY wait-for-db.sh /app/wait-for-db.sh
RUN chmod +x /app/wait-for-db.sh

# Start the app
CMD ["/app/wait-for-db.sh"]
