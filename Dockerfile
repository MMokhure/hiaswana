# Use PHP CLI image
FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzip-dev \
    zip unzip git curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Install PHP dependencies
RUN composer clear-cache \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Expose the port
EXPOSE 8080

# Set default port environment variable (can be overridden)
ENV PORT=8080

# Run migrations and start the server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
