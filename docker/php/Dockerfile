# PHP-FPM Dockerfile
FROM php:8.2-fpm-alpine

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    bash shadow icu-libs icu-data-full icu-dev libzip-dev oniguruma-dev libpng libpng-dev jpeg-dev freetype-dev git curl mariadb-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql intl zip gd \
    && addgroup -g 1000 www \
    && adduser -G www -u 1000 -D www \
    && rm -rf /var/cache/apk/* /tmp/*

WORKDIR /var/www/html

# Copy project (will be overridden by bind mount in dev)
COPY . /var/www/html

# Adjust ownership (optional for local dev)
RUN chown -R www:www /var/www/html

USER www

EXPOSE 9000
CMD ["php-fpm"]
