#!/bin/bash

if [[ "$(docker ps -aq -f name=mitp 2> /dev/null)" == "" ]]; then
  # do something
  docker run -p 9099:80 -v "$(pwd)":"/var/www/html" --name mitp -e LOCALDEV=1 -d php:8-apache
else
  docker start mitp
fi

echo "ingresar a http://localhost:9099/docs"

xdg-open http://localhost:9099/docs  2> /dev/null

nodemon --watch $(pwd)/src -e php --signal SIGTERM --exec "docker exec mitp /var/www/html/compile.sh DEV"

echo -e "\n\033[0;31m=> Compilando para Github!!!\033[0m\n"

docker exec mitp /var/www/html/compile.sh

echo -e "\033[0;32mAhora se puede commitear!\033[0m\n"
