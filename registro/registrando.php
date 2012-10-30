<?php
session_start(); 
require_once "../funciones/conexion.php";
require_once "../funciones/encriptado.php";
require_once "../funciones/general.php";
require_once "../funciones/mail.php";
if($_SESSION['Registro'] != NULL){ //Si la sesión existe descargo los valores del arreglo multidimensional
$Actividad_Valor = $_SESSION['Registro']['Actividad']['Valor'];
$Clave_Valor = $_SESSION['Registro']['Clave']['Valor'];
$Correo_Valor = $_SESSION['Registro']['Correo']['Valor'];
$Idioma_Valor = $_SESSION['Registro']['Idioma']['Valor'];
$Lada_Valor = $_SESSION['Registro']['Lada']['Valor'];
$Moneda_Valor = $_SESSION['Registro']['Moneda']['Valor'];
$Nombre_Valor = $_SESSION['Registro']['Nombre']['Valor']; 
$Ubicacion_Valor = $_SESSION['Registro']['Estado']['Valor'];
$Telefono_Valor = $_SESSION['Registro']['Telefono']['Valor'];
$_SESSION['Registro'] = NULL;
}else{
header("location:index.php");
}
//Defino variables centradas
$Telefono_Final_Valor = "$Lada_Valor-$Telefono_Valor";
$Fecha_Unix_Registro = time();
$Codigo_Seguridad = Codigo_Seguridad();
$Clave_Final = Encriptar($Clave_Valor);

$Verificar_Usuario_Existente = sprintf("SELECT estado_usuario FROM usuarios WHERE correo_usuario='%s' AND estado_usuario='1'
OR correo_usuario='%s' AND estado_usuario='2'",
				mysql_real_escape_string($Correo_Valor),
				mysql_real_escape_string($Correo_Valor));
$Resultado_Verificar_Usuario_Existente = mysql_query($Verificar_Usuario_Existente);
	if(mysql_num_rows($Resultado_Verificar_Usuario_Existente)){ //Si existe algun usuario activado o baneado con ese correo lo redirijo
			mysql_free_result($Resultado_Verificar_Usuario_Existente);
			header("location:../mensaje.php?Mensaje=correo_existente&Correo=$Correo_Valor&Redirige=iForgot");
	}
$Verificar_Usuario_No_Activado = sprintf("SELECT estado_usuario FROM usuarios WHERE correo_usuario='%s' 
AND estado_usuario='0'", //verifico si existe un correo igual registrado pero desactivado
		mysql_real_escape_string($Correo_Valor));
	$Resultado_Verificar_Usuario_No_Activado = mysql_query($Verificar_Usuario_No_Activado);
	if(mysql_num_rows($Resultado_Verificar_Usuario_No_Activado)){ //Si existe un usuario registrado con este correo sin activar, lo borro
	mysql_free_result($Resultado_Verificar_Usuario_No_Activado);
	mysql_query ("DELETE FROM usuarios WHERE correo_usuario='$Correo_Valor' AND estado_usuario='0'"); 
	}
$Nuevo_Usuario = sprintf("INSERT INTO usuarios (nombre_usuario, correo_usuario, clave_usuario, telefono_usuario, ubicacion_usuario,
	actividad_usuario, idioma_usuario, moneda_usuario, fecha_registro_usuario, token_usuario) VALUES 
('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')", 
				mysql_real_escape_string($Nombre_Valor),
				mysql_real_escape_string($Correo_Valor),
				mysql_real_escape_string($Clave_Final),
				mysql_real_escape_string($Telefono_Final_Valor),
				mysql_real_escape_string($Ubicacion_Valor),
				mysql_real_escape_string($Actividad_Valor),
				mysql_real_escape_string($Idioma_Valor),
				mysql_real_escape_string($Moneda_Valor),
				mysql_real_escape_string($Fecha_Unix_Registro),
				mysql_real_escape_string($Codigo_Seguridad)); 
if(mysql_query($Nuevo_Usuario)){
$Primer_Nombre = Primera_Palabra($Nombre_Valor);
$Asunto="$Nombre_Plataforma - Activa tu usuario";
$Mensaje='<body>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><p><font face="Verdana">Hola '.$Primer_Nombre.'</font></p>
    <p><font face="Verdana">Muchas gracias por registrarte en <a href="'.$Dominio_Plataforma.'" target="_blank">'.$Nombre_Plataforma.'</a>, para activar tu cuenta y terminar el proceso de registro, da clic en la siguiente liga:</font></p>
    <p><a href="'.$Dominio_Plataforma.'/auth.php?Accion=Alta&Correo='.$Correo_Valor.'&Token='.$Codigo_Seguridad.'" target="_blank"><font face="Verdana">'.$Dominio_Plataforma.'/auth.php?Accion=Alta&amp;Correo='.$Correo_Valor.'&amp;Token='.$Codigo_Seguridad.'</font></a></p>
    <p><font face="Verdana">Tu usuario: '.$Correo_Valor.'<br>
        Tu clave de acceso: 
    '.$Clave_Valor.'</font></p>
    <p><font face="Verdana">Si por algún motivo, la liga es inaccesible, entra directamente a '.$Dominio_Plataforma.'/registro/activar e ingresa tu correo y el siguiente código.</font></p>
    <p><font face="Verdana">Código: </font>    <font face="Verdana">'.$Codigo_Seguridad.'</font>    </p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>';
MailSMTP($Correo_Valor, $Asunto, $Mensaje);
header("location:../mensaje.php?Mensaje=registro_listo&Correo=$Correo_Valor&Redirige=dominio_correo");
}
?>