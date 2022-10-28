#!/bin/bash

if [[ "$(docker ps -aq -f name=mitp 2> /dev/null)" == "" ]]; then
  # do something
  docker run -p 9099:80 -v "$(pwd)":"/var/www/html" --name mitp -e LOCALDEV=1 -d php:8-apache
else
  docker start mitp
fi

echo "ingresar a http://localhost:9099/docs"

nodemon --watch $(pwd)/src -e php --exec "docker exec mitp /var/www/html/compile.sh"
#docker exec mitp /var/www/html/compile.sh
