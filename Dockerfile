FROM php:8.4-cli-bookworm

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV VIEW_COMPILED_PATH=/var/www/html/storage/framework/views

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libzip-dev libonig-dev \
    libxml2-dev libpq-dev zip unzip \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql mbstring zip gd bcmath opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-dev --no-scripts --no-interaction

COPY package.json package-lock.json .npmrc ./
RUN npm ci

COPY . .

RUN php artisan package:discover --ansi

ENV NODE_ENV=production
RUN npm run build && npm prune --omit=dev

RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

COPY docker-start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 8000

CMD ["/usr/local/bin/start.sh"]
