#WORDPRESS'S BLOG   

**Wordpress's Blog** tiene como finalidad mostrar funciones que nos ayudará a desarrollar un blog en wordpress de manera fácil y rápida,
usaremos funciones propias de wordpress para desarrollar el blog.

Para crear un blog en wordpress, empezaremos definiendo los pasos y archivos que usaremos.

1. Descargar wordpress (https://wordpress.org/).
2. Instalar wordpress en un virtual host.

Wordpress descarga una serie de archivos y carpetas, ahora sólo usaremos la carpeta wp-content y el archivo wp-config 
(aquí configuras el nombre de tu base de datos, etc; usaremos como referencia el archivo [wp-config-sample.php](wp-config-sample.php)).
Por defecto Wordpress tiene activado un tema (theme), 
![default theme](images_readme/default_theme.png)
lo desactivaremos para crear nuestro propio tema.

####Crear un theme en wordpress:

Para crear un theme nos ubicaremos en la carpeta [wp-content/themes/](wp-content/themes/).

* Crearemos una carpeta para nuestro theme, en éste caso 'northsouth'.
* Dentro la carpeta nueva crearemos un archivo style.css, index.php, functions.php.
* Para la imagen de nuestro theme debemos añadir un archivo screenshot.jpg.

Ahora necesitamos tener una descripción de nuestro theme, para ello en el arhivo [style.css](wp-content/themes/northsouth/style.css)
añadiremos la descripción.

```php
/*
Theme Name: Northsouth
Author: Anabel Espinal
Description: Northsouth theme will help you to create your first theme easy and fast.
Version: 1.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: northsouth
This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
*/
```

La descripción debe estar comentada entre '/* */'.
