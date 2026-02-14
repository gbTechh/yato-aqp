FROM wordpress:latest

# Copiamos tus carpetas
COPY ./themes/yato-theme /var/www/html/wp-content/themes/yato-theme
COPY ./plugins/yato_postypes /var/www/html/wp-content/plugins/yato_postypes

# EL CAMBIO CLAVE: Le damos permiso a WordPress sobre TODO wp-content
# Así podrá crear carpetas en uploads, upgrades y plugins sin llorar.
RUN chown -R www-data:www-data /var/www/html/wp-content