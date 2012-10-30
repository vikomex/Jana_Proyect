<?php
/*
---------------------------------------------------------------------------

						DATOS DE CONEXIÓN CON LA BD

---------------------------------------------------------------------------
*/
$Contrasena="SXjm6iEeDQ2m";
$Nombre_BD="expopek";
$Servidor="mysql1069.servage.net";
$Usuario="expopek";
$Conexion = mysql_connect($Servidor, $Usuario, $Contrasena);
mysql_select_db($Nombre_BD, $Conexion);
mysql_set_charset('utf8');
/*
---------------------------------------------------------------------------

---------------------------------------------------------------------------

					DATOS GENERALES DE LA APLICACIÓN

---------------------------------------------------------------------------
*/
$Dominio_Plataforma = "http://expopek.com.mx/sys";
$CorreoElectronico_Plataforma = "info@expopek.com.mx";
$Nombre_Plataforma = "ExpoPek";
$Version_Plataforma = "1.0";
?>