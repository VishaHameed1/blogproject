#!/bin/sh

set -e

echo "========================================="
echo "Starting Chronicle Laravel Application"
echo "========================================="

# Ensure Laravel writable directories have correct ownership
chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

# Create the public storage symlink
php artisan storage:link || true

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting NGINX..."

nginx -g "daemon off;"