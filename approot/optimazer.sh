#!/usr/bin/bash

php composer.phar install
php composer.phar dump-autoload --optimize
php artisan clear-compiled
php artisan config:cache
php artisan route:cache
php artisan view:clear
php artisan cache:clear
rm -f bootstrap/cache/config.php
