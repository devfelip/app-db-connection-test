FROM felipecs8/nginx-php-composer:php80

WORKDIR /usr/share/nginx/html

COPY ./src .

COPY ./docker ./docker

RUN mv .env.example .env && mv ./docker/nginx_conf/default.conf /etc/nginx/conf.d && mv ./docker/php.ini /etc/php/8.0/fpm/php.ini && rm -r ./docker/nginx_conf

RUN chmod -R 755 /usr/share/nginx/html && \
    git config --global --add safe.directory /usr/share/nginx/html
    
# sed -i 's/\r$//' ./docker/script.sh Deixa arquivo com formato UNIX LF
CMD composer update; sed -i 's/\r$//' ./docker/script.sh  && chmod +x ./docker/script.sh && ./docker/script.sh; /start.sh