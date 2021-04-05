# FirmarPDFs-PHP-SQLServer
Página web que permite la firma de documentos PDF.

<hr>

El link del proyecto <code><strong>es solo para ver la vista (front-end)</strong></code>.
El servidor (back-end) esta utilizando <code><strong>UNA BASE DE DATOS LOCAL DE SQL Server</strong></code>, no una base de datos en la nube.

Esto provoca que no funcione el procesamiento de datos y marque error.<br>

Si desea ver el funcionamiento del proyecto deberá descargarlo y usar una base de datos local SQL Server.

<center>

[Ver lado del cliente](https://firmarpdfs-php-sqlserver.netlify.app/)

[![Netlify Status](https://api.netlify.com/api/v1/badges/991f5191-3bea-4c08-889b-12eac9db7221/deploy-status)](https://app.netlify.com/sites/firmarpdfs-php-sqlserver/deploys)
</center>
<hr>

<strong><i>Set Up:</i></strong>
* Versión de <code><strong>PHP 8.0.3</strong></code> , Arqitectura x64.
* Versión de <code><strong>XAMPP 3.2.4</strong></code>.
* Versión de <code><strong>SQL Server 2019</strong></code>.
* Instalar los driver de PHP para SQL Server en la carpeta <code><strong>xamp/php/ext</strong></code>. <br>

**IMPORTANTE: LA VERSION DEL DRIVER TIENE QUE CORRESPONDER CON LA VERSIÓN DE PHP Y LA ARQUITECTURA QUE ESTÁS USANDO, DE OTRO MODO NUNCA FUNCIONARÁ.** <br>
![drivers](http://fabiancruz.x10.mx/static/readme-firmaphp/driver-php.png)

[Link de drivers oficiales de PHP 7.3 a 8.0 para SQL Server.](https://docs.microsoft.com/en-us/sql/connect/php/download-drivers-php-sql-server?view=sql-server-ver15)

* Indicar en <code><strong>php.ini</strong></code> las extensiones:<br>

![drivers](http://fabiancruz.x10.mx/static/readme-firmaphp/archivo-ini.png)
<br>
* <strong>Arrancar servidor Apache.</strong>