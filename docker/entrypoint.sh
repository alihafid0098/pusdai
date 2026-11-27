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

php artisan storage:link || true

touch database/database.sqlite
php artisan migrate --force || true

# Isi data awal (admin + jadwal kajian) hanya saat database masih kosong
if ! php artisan tinker --execute='exit(\App\Models\User::exists() ? 1 : 0);' >/dev/null 2>&1; then
    php artisan db:seed --force || true
fi

exec "$@"
