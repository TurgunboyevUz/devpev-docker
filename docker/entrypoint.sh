#!/bin/sh
set -e

cd /var/www

# .env
if [ ! -f .env ]; then
  cp .env.example .env
  sed -i "s/DB_HOST=.*/DB_HOST=mysql/" .env
  sed -i "s/DB_DATABASE=.*/DB_DATABASE=devpev/" .env
  sed -i "s/DB_USERNAME=.*/DB_USERNAME=root/" .env
  sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=devpev/" .env
fi

# Composer install
if [ ! -d vendor ]; then
  echo "Installing composer dependencies..."
  composer install --no-interaction --prefer-dist
fi

# Key
php artisan key:generate --force || true

# Migrate
php artisan migrate --force || true

exec "$@"