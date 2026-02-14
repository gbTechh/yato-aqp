FROM wordpress:latest

# 1. Copiamos tu código a una carpeta "segura" fuera del volumen
# No lo ponemos en /var/www/html todavía porque el volumen lo taparía.
COPY ./themes/yato-theme /usr/src/yato-code/themes/yato-theme
COPY ./plugins/yato_postypes /usr/src/yato-code/plugins/yato_postypes
