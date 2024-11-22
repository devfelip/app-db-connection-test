#!/bin/bash
cd /usr/share/nginx/html

app_key=$(php artisan get-env APP_KEY)

if [[ -z $app_key ]]; then
    php artisan config:clear && php artisan key:generate
fi