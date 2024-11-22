FROM felipecs8/nginx-php-composer:php80

WORKDIR /usr/share/nginx/html

RUN chmod -R 755 /usr/share/nginx/html && \
    git config --global --add safe.directory /usr/share/nginx/html
    
# sed -i 's/\r$//' ./docker/script.sh Deixa arquivo com formato UNIX LF
CMD composer update; sed -i 's/\r$//' ./docker/script.sh  && chmod +x ./docker/script.sh && ./docker/script.sh; /start.sh

#CMD composer update; chmod +x ./docker/script.sh && ./docker/script.sh; /start.sh