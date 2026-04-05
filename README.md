# prueba-tecnica-DS
prueba tecnica creacion de usuarios con laravel backend y vue como frontend una interfaz simple y relativamente intuitiva

1 paso hay que descargar el repositorio
2 paso: hay que entrar en las carpetas por medio de la consola usando cd en windows 11 puede abrir una terminal con tansolo abrir la carpeta de repositorio y hacer click derecho seleccionando que quiere abrir una terminal como lo prefiera mas facil
3 paso: ejecutar:
composer install

eso instala todos los paquetes necesarios en el proyecto

4 paso:entrar al archivo .env y cambiar las credenciales de su base de datos "cambiar bases de datos, usuario y password" es la que dice "pgsql"
5 paso: Ejecutar:
php artisan migrate
6 paso: Si no funciona bien se puede ejecutar: 
php artisan migrate:fresh 

eso creara las tablas con todos los datos en este caso saldra una tabla que se llama usuario que es la que estoy usando

7 paso: ya de eso al confirmar que salio todo bien podemos levantar el servidor con:
php artisan serve

8 paso: abrir otra terminal y entrar a la carpeta cliente esta carpeta se ejecuta de dos formas:
nodemon app
si es que cuentas con nodemon instalado de forma global o tambien se puede ejecutar:
node app.js
(nodemon funciona como un entorno de desarrollo por eso al sentir cambios en app.js se actualiza el servidor app node)
pero antes de eso hay que instalar la paqueteria con: npm install

eso instalara todos los paquetes o bibliotecas que estan en el package.json señaladas

10 paso: ejecutar localhost:3000 y entrar al login donde ´pdra registrar un usuario o loguiarse
