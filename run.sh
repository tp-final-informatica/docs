#!/bin/bash

if [[ "$(docker ps -aq -f name=mtsp_php 2> /dev/null)" == "" ]]; then
  # do something
  docker run -p 9099:80 -v "$(pwd)":"/var/www/html" --name mtsp_php -d php:8-apache
else
  docker start mtsp_php
fi

if [[ "$(docker ps -aq -f name=mtsp_sass 2> /dev/null)" == "" ]]; then
  # do something
  docker run -p 9090:80 -v "$(pwd)":"/var/www/html" --name mtsp_sass -d catchdigital/node-sass
else
  docker start mtsp_sass
fi

echo "ingresar a http://localhost:9099/docs"

xdg-open http://localhost:9099/docs  2> /dev/null


nodemon --signal SIGTERM --exec "docker exec mtsp_php /var/www/html/compile.sh DEV; docker exec mtsp_sass sh /var/www/html/compile_sass.sh"

echo -e "\n\033[0;31m=> Compilando para Github!!!\033[0m\n"

docker exec mtsp_php /var/www/html/compile.sh

echo -e "\033[0;32mAhora se puede commitear!\033[0m\n"
