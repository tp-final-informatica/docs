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

echo "Compilando para Github!"

docker exec mitp /var/www/html/compile.sh

echo "Ahora se puede commitear."
