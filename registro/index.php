<? session_start(); if(!isset($_SESSION["Correo_Usuario"])){ //Si la sesión no existe accede
if($_SESSION['Registro'] != NULL){ //Si la sesión existe descargo los valores del arreglo multidimensional
$Actividad_Valor = $_SESSION['Registro']['Actividad']['Valor'];
$Clave_Reingreso_Valor = $_SESSION['Registro']['Clave_Reingreso']['Valor'];
$Clave_Valor = $_SESSION['Registro']['Clave']['Valor'];
$Correo_Valor = $_SESSION['Registro']['Correo']['Valor'];
$Estado_Valor = $_SESSION['Registro']['Estado']['Valor'];
$Idioma_Valor = $_SESSION['Registro']['Idioma']['Valor'];
$Lada_Valor = $_SESSION['Registro']['Lada']['Valor'];
$Moneda_Valor = $_SESSION['Registro']['Moneda']['Valor'];
$Nombre_Valor = $_SESSION['Registro']['Nombre']['Valor']; 
$Pais_Valor = $_SESSION['Registro']['Pais']['Valor'];
$Telefono_Valor = $_SESSION['Registro']['Telefono']['Valor'];
//ERRORES
$Actividad_Error = $_SESSION['Registro']['Actividad']['Error']; //Campo sin seleccionar
$Clave_Reingreso_Error = $_SESSION['Registro']['Clave_Reingreso']['Error'];// diferencia entre clave y clave_reingreso
$Clave_Error = $_SESSION['Registro']['Clave']['Error']; // Campo vacio
$Correo_Error = $_SESSION['Registro']['Correo']['Error']; //Campo sin valores ó incorrecto
$Estado_Error = $_SESSION['Registro']['Estado']['Error']; //Campo sin seleccionar
$Idioma_Error = $_SESSION['Registro']['Idioma']['Error']; //Campo sin seleccionar
$Lada_Error = $_SESSION['Registro']['Lada']['Error']; //Campo sin valores o no numérico
$Moneda_Error = $_SESSION['Registro']['Moneda']['Error']; //Campo sin seleccionar
$Nombre_Error = $_SESSION['Registro']['Nombre']['Error']; //Campo sin valores
$Pais_Error = $_SESSION['Registro']['Pais']['Error']; //Campo sin seleccionar
$Telefono_Error = $_SESSION['Registro']['Telefono']['Error']; //Campo sin valores o no numérico
$_SESSION['Registro'] = NULL; 
} //Elimino la sesión 
require_once "../funciones/validacion.php"; ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ExpoPek</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script language="javascript" src="../js/autotab.js"></script>
    <script language="javascript">
    function Select_Pais_Estado(){	
	var Pais = document.Registro.Pais.value; 
	<?php echo 'var Estado ="'.$Estado_Valor.'";';?> 
	$.post("../funciones/select_pais_estado.php", { Pais : Pais, Estado : Estado }, function(data){ $("#Select_Pais_Estado").html(data);});}
	</script>
</head>
<body>
    <form action="verificar.php" method="POST" name="Registro" id="Registro">
    <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" value="<? echo $Nombre_Valor; ?>"/></br>
    <input type="text" name="Correo" id="Correo" placeholder="Correo" value="<? echo $Correo_Valor; ?>"/> </br>
    <input name="Lada" onkeyup="return autoTab(this, 3, event);" placeholder="Lada" type="text" id="Lada" size="4" maxlength="3" value="<? echo $Lada_Valor; ?>"/> 
    <input type="text" name="Telefono" id="Telefono" placeholder="Teléfono" value="<? echo $Telefono_Valor; ?>"/></br>
    <input type="password" name="Clave" id="Clave" placeholder="Clave de acceso" value="<? echo $Clave_Valor; ?>"/></br>
    <input type="password" name="Clave_Reingreso" id="Clave_Reingreso" placeholder="Repite tu clave" value="<? echo $Clave_Reingreso_Valor; ?>" /></br>
    <select name="Pais" id="Pais" onchange="javascript:Select_Pais_Estado();">
      <option value="-1">- Selecciona tu ubicación -</option>
      <option value="1"<? Validacion_Select("1", $Pais_Valor) ?>>México</option>
      <option value="2"<? Validacion_Select("2", $Pais_Valor) ?>>Otro País</option>
    </select></br>
 <div id="Select_Pais_Estado"></div> 
     <script type="text/javascript">Select_Pais_Estado();</script>   
    <input type="checkbox" value="1" name="Actividad[]"  />Manejador
    <input type="checkbox" value="2" name="Actividad[]"  />Criador
    <input type="checkbox" value="3" name="Actividad[]"  />Representante de un club Canófilo</br>
    <select name="Idioma" id="Idioma">
      <option value="">- Selecciona tu idioma -</option>
      <option value="1"<? Validacion_Select("1", $Idioma_Valor) ?>>Español</option>
      <option value="2"<? Validacion_Select("2", $Idioma_Valor) ?>>English</option>
    </select></br>
    <select name="Moneda" id="Moneda">
      <option value="">- Selecciona tu moneda -</option>
      <option value="1" <? Validacion_Select("1", $Moneda_Valor) ?>>Pesos Mexicanos</option>
      <option value="2" <? Validacion_Select("2", $Moneda_Valor) ?>>Dolares Americanos</option>
    </select></br>
    <input type="checkbox" value="1" name="Acepto" onclick="Registrar.disabled = !this.checked"  />
    Acepto los términos y condiciones. </br>
    <input name="Registrar" type="submit" disabled="disabled" value="Registrarme"  />
</form>
</body>
</html>
<? }else{ header("location:../panel.php"); } //Si la sesión existe redirige al panel de administración ?>


