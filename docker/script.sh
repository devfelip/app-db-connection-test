#!/bin/bash
cd /usr/share/nginx/html

app_key=$(php artisan get-env APP_KEY)

# Gera uma nova APP_KEY se ela estiver vazia
if [[ -z $app_key ]]; then
    echo "APP_KEY não está definida ou está vazia. Gerando uma nova chave..."
    php artisan config:clear && php artisan key:generate
else
    echo "APP_KEY já está definida: $app_key"
fi
