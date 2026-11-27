
#!/bin/sh
set -eu

# Create .env if missing
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Configure public URL on Render
if [ -z "${APP_URL:-}" ] && [ -n "${RENDER_EXTERNAL_URL:-}" ]; then
    export APP_URL="$RENDER_EXTERNAL_URL"
fi

# Require secrets from Render Environment
: "${APP_KEY:?APP_KEY wajib diatur di Render}"
: "${ADMIN_PASSWORD:?ADMIN_PASSWORD wajib diatur di Render}"

# Prepare Laravel directories
mkdir -p storage/framework/cache/data \
         storage/framework/sessions \
         storage/framework/views \
         storage/logs \
         bootstrap/cache

chown -R www-data:www-data storage bootstrap/cache

# Create SQLite database only when SQLite is selected
if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    DB_FILE="${DB_DATABASE:-database/database.sqlite}"
    mkdir -p "$(dirname "$DB_FILE")"
    touch "$DB_FILE"
    chown www-data:www-data "$DB_FILE"
fi

# Clear old configuration
php artisan config:clear

# Run migrations (must succeed)
php artisan migrate --force

# Seed initial data only if admin user does not exist
if ! php artisan tinker --execute='exit(\App\Models\User::where("email", env("ADMIN_EMAIL", "admin@pusdai.com"))->exists() ? 0 : 1);' >/dev/null 2>&1; then
    php artisan db:seed --force
fi

# Create public storage symlink if missing
if [ ! -e public/storage ] && [ ! -L public/storage ]; then
    php artisan storage:link
fi

# Production cache
php artisan config:cache
php artisan view:cache

# Start Apache
exec "$@"
