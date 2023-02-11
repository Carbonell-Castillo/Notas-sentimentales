# Notas-sentimentales
Este repositorio contiene una página web que permite almacenar y gestionar notas sentimentales en una base de datos. La página web cuenta con un sistema de inicio de sesión y registro de usuarios, y permite filtrar, editar y eliminar las notas de diferentes tipos.

El proyecto es un ejemplo básico de un CRUD (Create, Read, Update, Delete), y incluye validaciones para el inicio de sesión y el registro de usuarios, así como la opción de cambiar el avatar del usuario y editar sus datos de cuenta.

La página web está construida con HTML, CSS, PHP y la base de datos está implementada en MySQL.

## Requisitos
Para ejecutar esta página web en su entorno local, debe tener los siguientes requisitos:

- Servidor web (Apache, Nginx, etc.)
- PHP 7.0 o superior
- MySQL 5.7 o superior

## Instalación
1. Descargue o clone este repositorio en su entorno local.
2. Configure su servidor web y PHP para apuntar al directorio raíz del repositorio.
3. Importe el archivo **DB/database.sql** en su base de datos MySQL para crear la estructura de la base de datos.
4. Importe el archivo **DB/storedProcedures.sql** en su base de datos MySQL para crear los procedimientos almacenados.
5. Ejecute el archivo **DB/exec.sql** en su base de datos MySQL para ejecutar los procedimientos almacenados.
6. Modifique el archivo app-assets/db.php con los detalles de su conexión a la base de datos.
7. Acceda a la página web a través de su navegador web.

## Uso
Una vez instalado, puede registrarse como usuario y comenzar a almacenar y gestionar sus notas sentimentales en la página web. También puede editar y eliminar sus notas, así como cambiar su avatar y editar sus datos de cuenta.

## Contribución
Si desea contribuir a este proyecto, puede crear una pull request con sus cambios o informar de errores y sugerencias a través del sistema de issues.

## Licencia
Este proyecto está licenciado bajo la licencia MIT.
