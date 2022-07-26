# Sobre Quien quiere ser Solidario?

Quien quiere ser Solidario es una aplicación web que te permite divertirte y entrenar tu agilidad mental a través de preguntas Quiz.
¡Podrás también disfrutar de la compañía de tus amigos e incluso competir contra ellos en un ranking mensual!

Cada mes, se elegirá un ganador (que será el que más puntos tenga), y este decidirá a qué Asociación/Organización irá destinado el premio de ese mes.

- **[Quien quiere ser Solidario?](https://quien-quiere-ser-solidario.herokuapp.com/)**

## Imágenes del Panel Administrativo

## Equipo:

- **[Adrián Pelayo](https://github.com/bigbae18) - Product Owner**
- **[Sergi Aparicio](https://github.com/Sergiaparicio) - Scrum Master**
- **[Abde Belkhialat](https://github.com/Abde955) - Developer**
- **[Guillermo Labrador](https://github.com/Guillermo970) - Developer**

## Panel Administrativo

Podrás organizar y gestionar las Preguntas y Usuarios que tiene tu aplicación web a tiempo real. Futuramente, queremos incluir el sistema de Ganadores y Organizaciones.

Este panel está diseñado para ser usado en **Ordenador**.

### Tecnologías Usadas

- **[PHP](https://www.php.net)**
- **[Laravel](https://laravel.com/docs/9.x/releases)**
- **[Laravel Blade Templates](https://laravel.com/docs/9.x/blade)**
- **[Tailwind CSS](https://tailwindcss.com/docs/installation)**
- **[JavaScript (Acciones DOM)](https://developer.mozilla.org/es/docs/Web/JavaScript)**

## Dependencias para tener el proyecto en local

Para poder clonar este repositorio y poder tener el proyecto en local, como requisitos debéis tener instalados:

- **[Git](https://git-scm.com)**
- **[Composer](https://getcomposer.org)**
- **[XAMPP](https://www.apachefriends.org/es/index.html) para poder tener acceso a una base de datos y su panel de administración**
- **[NodeJS](https://nodejs.org/es/)**

Una vez tengas instaladas estas dependencias en tu ordenador, puedes seguir con el siguiente paso.

## Set-Up en Local

- Primer paso: **Clonar el repositorio**

Abrimos una `consola` en el lugar donde queremos el proyecto. Escribimos:

> git clone https://github.com/quien-quiere-ser-solidario/backend.git

Una vez se nos haya clonado, se nos habrá creado una nueva carpeta `backend` en la carpeta donde estemos. Para entrar en ella, desde la misma consola escribimos:

> cd backend

- Segundo paso: **Instalar dependencias**

Con la ayuda de `Composer` y `NPM` instalaremos las dependencias que necesita el proyecto para funcionar. Primero de todo, en esa misma consola, escribimos:

> composer install

Esto instalará todas las dependencias que necesita `Laravel`. Si queréis cercioraros de que todo ha ido bien y no hay nada más que hacer, una vez acabe ese comando podéis escribir:

> composer update

Esto se cerciorará de que todo esté actualizado y listo. Ahora vamos con las dependencias que necesita `Laravel` de `NodeJS` para poder estilizar las diferentes vistas:

> npm install

Y como hemos hecho con composer, para cerciorarnos, podemos escribir una vez acabe:

> npm update

Con estos 4 comandos estaremos listos en lo que son las dependencias.

- Tercer paso: **Crear archivo de variables entorno**

En vuestra carpeta `backend`, hay un archivo que se llama `.env.example`. Ese archivo nos sirve como plantilla para generar nuestro archivo de variables de entorno. Copiamos todo el contenido dentro del fichero `.env.example`, creamos un fichero nuevo llamado `.env` y pegamos todo el contenido dentro.
Ahora, si seguimos teniendo abierta la consola de antes (si no, abrimos una dentro de la carpeta `backend`), escribiremos:

> php artisan key:generate

Esto generará una nueva Llave de Aplicación para Laravel. Para que Laravel sepa de ese cambio en el archivo `.env`, tiene un comando. Escribimos:

> php artisan config:cache

Y esto limpiará la memoria en cache que tenga ese archivo de entorno. Ahora, dentro de ese fichero `.env`, tendremos que editar algunas cosas. Por ejemplo, el nombre que queramos para nuestra base de datos, (por defecto el nombre es `laravel`), o el usuario con el que vamos a entrar a nuestra base de datos, la contraseña, el puerto, etc... El nombre de base de datos que usamos nosotros, por ejemplo, es `trivial`. Cuando hayas decicido el nombre, cambia este apartado del archivo `.env`:

> DB_DATABASE=aqui el nombre de tu base de datos

Y con esto, nos vamos al paso cuatro.

- Cuarto paso: **Crear la base de datos y habilitar XAMPP**

Con `XAMPP` instalado, podemos abrir su panel de control y veremos 5 opciones. Entre ellas, un servidor Apache (servidor web), un servidor MySQL (bases de datos), un servidor FileZilla (conexiónes FTP), un servidor Mercury (conexión Mail) y un servidor Tomcat (Servidor servlets para Java). En nuestro caso nos interesan las dos primeras, así que le daremos a la opción que dice:

> Start

En las opciones de `Apache` y `MySQL`. Una vez nos ponga el nombre con un fondo verde, y se cambie esa opción a stop, querrá decir que podremos ir ya a:

> http://localhost/phpmyadmin

La cual es la página que nos permite XAMPP para manejar nuestro `MySQL`. Ahí le daremos al botón de la izquierda que dice `Nueva` con un símbolo cilíndrico y un `+` verde, y ahí se nos abrirá una página para crear una nueva base de datos. Aquí, pon el nombre que has puesto en el archivo de configuración de variables de entorno en el anterior paso.

- Quinto paso: **Llenar la base de datos**

Una vez nuestra base de datos esté creada, Laravel tenga las variables de entorno bien predefinidas y hayamos instalado las dependencias, llega el punto de nutrir a nuestra base de datos de tablas.

En una consola en el mismo proyecto podemos escribir el comando:

> php artisan migrate:fresh

ó, si prefieres usar nuestro generador de datos:

> php artisan migrate:fresh --seed

Con esto te creará la estructura de base de datos necesaria como para poder iniciar la aplicación. Por ende ahora podemos escribir, teniendo 2 terminales abiertas en la carpeta de nuestro proyecto:

> php artisan serve
> npm run watch

Una vez inicializados los comandos, veréis el resultado en [http://localhost:8000]

## Agradecimientos

Agradecemos a Factoría F5 por nutrirnos de conocimientos para poder llegar a lo que somos, y a nuestro cliente Pablo por el buen trato recibido y el feedback constante.
