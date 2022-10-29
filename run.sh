#!/bin/bash

if [[ "$(docker ps -aq -f name=mitp 2> /dev/null)" == "" ]]; then
  # do something
  docker run -p 9099:80 -v "$(pwd)":"/var/www/html" --name mitp -d php:8-apache
else
  docker start mitp
fi

if [[ "$(docker ps -aq -f name=sass 2> /dev/null)" == "" ]]; then
  # do something
  docker run -p 9090:80 -v "$(pwd)":"/var/www/html" --name sass -d catchdigital/node-sass
else
  docker start sass
fi

echo "ingresar a http://localhost:9099/docs"

xdg-open http://localhost:9099/docs  2> /dev/null

#nodemon --watch $(pwd)/src -e php --signal SIGTERM --exec "docker exec mitp /var/www/html/compile.sh DEV; docker exec sass sh /var/www/html/compile_sass.sh"
nodemon --watch $(pwd)/src -e php,scss --signal SIGTERM --exec "docker exec mitp /var/www/html/compile.sh DEV; docker exec sass sh /var/www/html/compile_sass.sh"

echo -e "\n\033[0;31m=> Compilando para Github!!!\033[0m\n"

docker exec mitp /var/www/html/compile.sh

echo -e "\033[0;32mAhora se puede commitear!\033[0m\n"
