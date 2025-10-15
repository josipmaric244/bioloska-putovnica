# Stage 1: Build assets using Node
FROM node:22 AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY resources/ ./resources/
COPY vite.config.js ./
COPY public/ ./public/

# You must copy Laravel app files if Vite is importing from them (like Vue components)
COPY . .

# Build frontend assets (optional: run only in production)
RUN npm run build


# Stage 2: PHP + Composer
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel source code
COPY . .

# Copy frontend assets from previous build
COPY --from=frontend /app/public/build /var/www/public/build

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port for PHP-FPM (used by nginx reverse proxy)
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]

