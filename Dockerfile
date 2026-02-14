FROM wordpress:latest

COPY ./themes/yato-theme /var/www/html/wp-content/themes/yato-theme
COPY ./plugins/yato_postypes /var/www/html/wp-content/plugins/yato_postypes

RUN chown -R www-data:www-data /var/www/html/wp-content/themes/yato-theme \
    && chown -R www-data:www-data /var/www/html/wp-content/plugins/yato_postypes