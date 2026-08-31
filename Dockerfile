# ============================================================
# Stage 1: Build frontend assets
# ============================================================
FROM node:20-bookworm AS frontend

WORKDIR /app

# Copy only package files first for better Docker layer caching
COPY package.json package-lock.json ./

RUN npm ci

# Copy frontend source/config
COPY resources ./resources
COPY public ./public
COPY vite.config.js ./
COPY tailwind.config.js ./
COPY postcss.config.js ./

# Build Vite production assets
RUN npm run build


# ============================================================
# Stage 2: Production Laravel application
# ============================================================
FROM php:8.2-fpm-bookworm


# ============================================================
# System dependencies
# ============================================================
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    default-mysql-client \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        intl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


# ============================================================
# Composer
# ============================================================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# ============================================================
# Laravel application
# ============================================================
WORKDIR /var/www/html

COPY . .


# ============================================================
# Install production Composer dependencies
#
# --no-dev:
# Removes development packages such as:
#   laravel/pail
#   laravel/breeze
#   phpunit
#
# --no-scripts:
# Prevents Composer scripts from running during image build.
# ============================================================
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts


# ============================================================
# Remove development-only Laravel package discovery caches
#
# Your local project can contain:
#   bootstrap/cache/packages.php
#   bootstrap/cache/services.php
#
# These may reference Laravel\Pail\PailServiceProvider even
# though Pail is excluded by composer install --no-dev.
#
# We remove ONLY these generated cache files inside Docker.
# Your original local files are NOT modified.
# ============================================================
RUN rm -f \
    bootstrap/cache/packages.php \
    bootstrap/cache/services.php


# ============================================================
# Copy Vite production assets
# ============================================================
COPY --from=frontend /app/public/build ./public/build


# ============================================================
# Laravel writable directories
# ============================================================
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data \
        storage \
        bootstrap/cache


# ============================================================
# NGINX configuration
# ============================================================
COPY docker/nginx.conf /etc/nginx/sites-available/default


# ============================================================
# Container startup script
# ============================================================
COPY docker/start.sh /usr/local/bin/start.sh

RUN chmod +x /usr/local/bin/start.sh


# ============================================================
# Render expects the application to listen on port 8080
# ============================================================
EXPOSE 8080


# ============================================================
# Start Laravel + PHP-FPM + NGINX
# ============================================================
CMD ["/usr/local/bin/start.sh"]