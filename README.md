# FirmarPDFs-PHP-SQLServer
Página web que permite la firma de documentos PDF.

<hr>

El link del deploy es solo para ver el front-end.<br>
El back-end esta utilizando una base de datos local de SQLServer, por lo cual no funcionará.
<hr>

<strong><i>Set Up:</i></strong>
* Versión de <code><strong>PHP 8.0.3</strong></code> , Arqitectura x64.
* Versión de <code><strong>SQL Server 2019</strong></code>.
* Instalar los driver de PHP para SQL Server en la carpeta <code><strong>xamp/php/ext.</strong></code> <br>

**IMPORTANTE: LA VERSION DEL DRIVER TIENE QUE CORRESPONDER CON LA VERSIÓN DE PHP Y LA ARQUITECTURA QUE ESTÁS USANDO, DE OTRO MODO NUNCA FUNCIONARÁ.** <br>
![drivers](http://fabiancruz.x10.mx/static/readme-firmaphp/driver-php.png)

[Link de drivers oficiales de PHP 7.3 a 8.0 para SQL Server.](https://docs.microsoft.com/en-us/sql/connect/php/download-drivers-php-sql-server?view=sql-server-ver15)
<br>
* Indicar en <code><strong>php.ini</strong></code> las extensiones:<br>

![drivers](http://fabiancruz.x10.mx/static/readme-firmaphp/archivo-ini.png)
<br>
* <strong>Arrancar servidor Apache.</strong>