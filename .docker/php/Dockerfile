
FROM composer:lts as deps
##
WORKDIR /app
#
#
##RUN --mount=type=bind,source=composer.json,target=composer.json \
##    --mount=type=bind,source=,target=composer.lock \
##    --mount=type=cache,target=/tmp/cache \
##    composer install --no-dev --no-interaction
#
#
COPY composer.json composer.lock ./
#RUN composer install --no-dev --optimize-autoloader
RUN composer install --no-dev --optimize-autoloader --ignore-platform-req=ext-mysqli --ignore-platform-req=ext-pdo_mysql




FROM php:8.2-apache as final


#RUN docker-php-ext-install mysqli pdo_mysql
##RUN apt-get update && apt-get install -y unzip git
#RUN apt-get update && apt-get upgrade -y && apt-get install -y git
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install -y apt-utils unzip git libmariadb-dev

# Встановлення PHP-розширень
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Копіюємо Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer



RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY ../.. /var/www/html
COPY --from=deps /app/vendor ./vendor

USER root
