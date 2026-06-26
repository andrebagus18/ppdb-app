FROM dunglas/frankenphp:php8.4

WORKDIR /app

# Install dependency yang dibutuhkan
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libpq-dev \
    && install-php-extensions \
    zip \
    gd \
    pdo_pgsql \
    redis \
    opcache

# Install Node.js 22
COPY --from=node:22 /usr/local/bin /usr/local/bin
COPY --from=node:22 /usr/local/lib/node_modules /usr/local/lib/node_modules
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln -s /usr/local/lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx

# Copy composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install dependency PHP
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Build Vite
RUN npm install
RUN npm run build

# Permission
RUN mkdir -p storage/framework/{cache,sessions,views} \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "octane:frankenphp", "--host=0.0.0.0", "--port=8000"]