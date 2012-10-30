<?php
$Accion = $_GET['Accion'];
$Correo = $_GET['Correo'];
$ID = $_GET['ID'];
$Token = $_GET['Token'];
require "funciones/conexion.php";
switch ($Accion){ 
case "Alta": 
$Consulta_Limpia = sprintf("SELECT correo_usuario, estado_usuario, token_usuario 
FROM usuarios WHERE correo_usuario = '%s' AND token_usuario = '%s' LIMIT 1",
mysql_real_escape_string($Correo), mysql_real_escape_string($Token));
$Consulta_Existente = mysql_fetch_array(mysql_query($Consulta_Limpia)); 
$Correo_BD = $Consulta_Existente['correo_usuario'];
$Estado_BD = $Consulta_Existente['estado_usuario'];
$Token_BD = $Consulta_Existente['token_usuario'];
if($Estado_BD == 2){
header("location:mensaje.php?Mensaje=usuario_baneado");
}elseif($Estado_BD == 1){
header("location:mensaje.php?Mensaje=usuario_ya_activado");
}elseif($Correo == $Correo_BD AND $Token == $Token_BD){
mysql_query("UPDATE usuarios SET estado_usuario = '1' WHERE correo_usuario = '$Correo' AND token_usuario = '$Token'");
header("location:mensaje.php?Mensaje=usuario_activado_exitosamente");
}else{
header("location:mensaje.php?Mensaje=error");
}
break;
default:
 header("location:mensaje.php?Mensaje=error");
}
?>