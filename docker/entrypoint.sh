#!/bin/sh
set -e

if [ ! -f .env ]; then
    cp .env.example .env
fi

if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

touch database/database.sqlite
php artisan migrate --force || true

exec "$@"
