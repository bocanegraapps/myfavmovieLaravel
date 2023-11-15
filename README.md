My Fav Movie Laravel FullStack Project
======================================

Esto es una aplicación creada en laravel para el track de PHP de Hack a Boss impartido por Guillermo Maquieira para EMAIS para demostrar los conceptos adquiridos en PHP durante ese track para la certificación del mismo.

¿Qué requerimientos necesitas para hacer funcionar el proyecto?
---------------------------------------------------------------

  * PHP 8.2;
  * Extensión PDO-Mysql activada en php.ini
  * Extensión CURL activada en php.ini
  * Se incluye un fichero php.ini que se ha usado con el proyecto a modo de ejemplo para configurar vuestro entorno php, está en la carpeta ETC
  * Composer
  * Node (para el front compilado en MIX) y NPM
  * Mysql Community Server

Preparar el entorno de desarrollo para hacer funcionar el proyecto
------------------------------------------------------------------

* Bajar toda la distribución PHP 8.2 correspondiente a tu sistema operativo.
* Instalar composer correspondiente a tu sistema operativo.
* Clonar el respositorio en una carpeta, entrar en esa carpeta y hacer un composer update para instalar las dependencias necesarias.
* Instalar MySql community server correspondiente a tu sistema operativo.
* Con una herramienta adecuada, abrir el fichero database.sql (dentro de la carpeta etc) con el fin de crear la base de datos local necesaria.
* Configurar el fichero .env con los datos necesarios para la conexión a la base de datos MySQL (comentar cualquier otro controlador de BD)
* Hacer un COMPOSER UPDATE para instalar las dependencias
* Hacer un NPM I para instalar las dependencias javascrtip necesarias para el FRONT
* Lanzar el servidor de pruebas con PHP artisan serve.
* Url 127.0.0.1:8000 para probar la aplicación.

El proyecto ya viene con una clave API de TMDB para funcionar.

Funcionamiento
--------------
En la ventana principal aparecerán las pelis que tienes en tu lista de favoritos, en esa lista podrás establecer una valoración personal o eliminarla. Arriba vemos un buscador general, escribe el título de una película y pulsa ENTER para ver resultados, en la lista de resultados usa el botón "añadir" para agregar esa peli a tu lista (la peli no se añadirá si ya existe en tu lista).

Enlaces útiles
--------------
* https://laravel.com
* https://getcomposer.org/
* [https://www.nodejs.com](https://nodejs.org/en)https://nodejs.org/en
