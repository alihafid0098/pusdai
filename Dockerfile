
# ==========================================
# STAGE 1: BUILD FRONTEND (VITE)
# ==========================================
FROM node:22-alpine AS assets

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# ==========================================
# STAGE 2: INSTALL LARAVEL DEPENDENCIES
# ==========================================
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --no-scripts \
    --no-autoloader

COPY . .

RUN composer dump-autoload --optimize --no-dev


# ==========================================
# STAGE 3: PRODUCTION SERVER
# ==========================================
FROM php:8.3-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       libzip-dev \
       libpng-dev \
       libonig-dev \
       libsqlite3-dev \
       unzip \
    && docker-php-ext-install \
       pdo \
       pdo_sqlite \
       mbstring \
       zip \
    && rm -rf /var/lib/apt/lists/*

# Configure Apache
RUN a2enmod rewrite headers \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
       /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
       /etc/apache2/apache2.conf \
       /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

# Copy Laravel application
COPY --from=vendor /app /var/www/html

# Copy compiled Vite assets
COPY --from=assets /app/public/build /var/www/html/public/build

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache database \
    && chmod -R ug+rwx storage bootstrap/cache database

# Entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["apache2-foreground"]
