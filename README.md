# Repositorio para el informe del trabajo final

## Desarrollo

Para desarrollar correr el script 

```bash
bash run.sh
```

El script utiliza Docker, y levanta dos contenedores: `mtsp_php` y `mtsp_sass` y deja corriendo un nodemon que los ejecuta cuando identifica cambios en la carpeta src, en los archivos de extension `scss` y `php`.

Los archivos `PHP` y `scss` se editan en el directorio `src` y son compilados por el script `run.sh` en el directorio `docs`.
Los archivos `JS` o los recursos como imágenes deben editarse en el directorio `docs`.

## Commits
Para commitear es necesario cortar la ejecución del script `run.sh`. Esto hace que las dependencias de desarrollo no se compilen en el HTML estático final (live reloading, por ejemplo).
Una vez hecho el commit, si se desea seguir trabajando, volver a ejecutar el script.

## Eliminar el proyecto localmente
Al finalizar de trabajar, si no se va a continuar más, eliminar los contenedores utilizados corriendo esto en la terminal de Linux:

```bash
docker stop mtsp_php mtsp_sass
docker rm mtsp_php mtsp_sass
```