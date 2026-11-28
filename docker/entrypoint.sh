#!/bin/sh
set -e

if [ ! -f .env ]; then
    cp .env.example .env
fi

# Bila DATABASE_URL diisi (mis. Postgres dari Neon), pakai itu.
if [ -n "$DATABASE_URL" ]; then
    export DB_CONNECTION=pgsql
    export DB_URL="$DATABASE_URL"
fi

# Di Render, alamat publik tersedia lewat RENDER_EXTERNAL_URL.
if [ -z "$APP_URL" ] && [ -n "$RENDER_EXTERNAL_URL" ]; then
    export APP_URL="$RENDER_EXTERNAL_URL"
fi

if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

php artisan storage:link || true

if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    touch database/database.sqlite
fi

php artisan migrate --force || true

# Isi data awal (admin + jadwal kajian) hanya saat database masih kosong
if ! php artisan tinker --execute='exit(\App\Models\User::exists() ? 1 : 0);' >/dev/null 2>&1; then
    php artisan db:seed --force || true
fi

exec "$@"
