#!/bin/sh
set -e

echo "Waiting for PostgreSQL database to be ready..."

# Loop until PostgreSQL is reachable
until php -r "
new PDO(
    'pgsql:host=' . getenv('DB_HOST') .
    ';port=' . getenv('DB_PORT') .
    ';dbname=' . getenv('DB_DATABASE'),
    getenv('DB_USERNAME'),
    getenv('DB_PASSWORD')
);
" 2>/dev/null
do
  echo "Database not ready yet, sleeping 2 seconds..."
  sleep 2
done

echo "Database ready, running migrations..."
php artisan migrate --force

echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=$PORT
