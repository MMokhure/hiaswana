# Use official PHP image with extensions for Laravel
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    curl \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Expose the dynamic port from Railway
ENV PORT=${PORT:-8080}

# Run migrations and start the server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT}
