#!/bin/bash

cd /var/www/html/ ;
#node-sass --watch --recursive --output docs/css --source-map true --source-map-contents src/sass
node-sass --recursive --output docs/css --source-map true --source-map-contents src/sass
