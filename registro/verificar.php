<?php
session_start(); //Inicio la sesión
require_once "../funciones/formato.php";
require_once "../funciones/general.php";
if($_SESSION['Registro'] != NULL){ //Si la sesión de registro existe la eliminamos, ya que lo obtendremos por POST
$_SESSION['Registro'] = NULL;
}
$Actividad_Valor = implode(',', $_POST['Actividad']); 
$Clave_Reingreso_Valor = $_POST['Clave_Reingreso'];
$Clave_Valor = $_POST['Clave'];
$Correo_Valor = strtolower($_POST['Correo']);
$Estado_Valor = $_POST['Estado'];
$Idioma_Valor = $_POST['Idioma'];
$Lada_Valor = Entrada_Texto($_POST['Lada']);
$Moneda_Valor = $_POST['Moneda'];
$Nombre_Valor = Primera_Mayuscula($_POST['Nombre']);
$Pais_Valor = $_POST['Pais'];
$Telefono_Valor = Entrada_Texto($_POST['Telefono']);
//Iniciamos el interrogatorio
if($Nombre_Valor==NULL){ //Nombre vacio
	$Nombre_Array = "";
	$Nombre_Error = 1;
}else{
	$Nombre_Array = $Nombre_Valor;
	$Nombre_Error = 0;
}

if($Correo_Valor==NULL OR !Verificar_Correo_Valido($Correo_Valor)){ //Correo vacio ó invalido
	$Correo_Array = "";
	$Correo_Error = 1;
}else{
	$Correo_Array = $Correo_Valor;
	$Correo_Error = 0;
}

if($Lada_Valor==NULL OR !ctype_digit($Lada_Valor) OR $Telefono_Valor==NULL OR !ctype_digit($Telefono_Valor)){ //Lada vacia ó no numérica
	$Lada_Array = "";
	$Lada_Error = 1;
	$Telefono_Array = "";
	$Telefono_Error = 1;
}else{
	$Lada_Array = $Lada_Valor;
	$Lada_Error = 0;
	$Telefono_Array = $Telefono_Valor;
	$Telefono_Error = 0;
}

if($Clave_Valor == NULL){ //Clave vacia
	$Clave_Array = "";
	$Clave_Error = 1;
}else{
	$Clave_Array = $Clave_Valor;
	$Clave_Error = 0;
}

if($Clave_Reingreso_Valor == NULL OR $Clave_Reingreso_Valor != $Clave_Valor){ //Clave_Reingreso vacia ó diferente a Clave
	$Clave_Array = "";
	$Clave_Reingreso_Array = "";
	$Clave_Reingreso_Error = 1;
}else{
	$Clave_Reingreso_Array = $Clave_Reingreso_Valor;
	$Clave_Reingreso_error = 0;
}

if($Pais_Valor == "-1"){ //País no seleccionado
	$Pais_Array = "";
	$Pais_Error = 1;
}else{
	$Pais_Array = $Pais_Valor;
	$Pais_Error = 0;
}

if($Estado_Valor == "-1"){ //Estado no seleccionado
	$Estado_Array = "";
	$Estado_Error = 1;
}else{
	$Estado_Array = $Estado_Valor;
	$Estado_Error = 0;
}

if($Idioma_Valor == ""){ //Idioma no seleccionado
	$Idioma_Array = "";
	$Idioma_Error = 1;
}else{
	$Idioma_Array = $Idioma_Valor;
	$Idioma_Error = 0;
}

if($Moneda_Valor == ""){ //Moneda no seleccionado
	$Moneda_Array = "";
	$Moneda_Error = 1;
}else{
	$Moneda_Array = $Moneda_Valor;
	$Moneda_Error = 0;
}

$Registro_Arreglo = array(
"Actividad" => 
		array("Valor"=>"$Actividad_Valor","Error"=>"-1"),
"Clave_Reingreso" => 
		array("Valor"=>"$Clave_Reingreso_Array","Error"=>"$Clave_Reingreso_Error"),
"Clave" => 
		array("Valor"=>"$Clave_Array","Error"=>"$Clave_Error"),
"Correo" => 
		array("Valor"=>"$Correo_Array","Error"=>"$Correo_Error"),
"Estado" => 
		array("Valor"=>"$Estado_Array","Error"=>"$Estado_Error"),
"Idioma" => 
		array("Valor"=>"$Idioma_Array","Error"=>"$Idioma_Error"),
"Lada" => 
		array("Valor"=>"$Lada_Array","Error"=>"$Lada_Error"),
"Moneda" => 
		array("Valor"=>"$Moneda_Array","Error"=>"$Moneda_Error"),
"Nombre" => 
		array("Valor"=>"$Nombre_Array","Error"=>"$Nombre_Error"),
"Pais" => 
		array("Valor"=>"$Pais_Array","Error"=>"$Pais_Error"),
"Telefono" => 
		array("Valor"=>"$Telefono_Array","Error"=>"$Telefono_Error"));
$_SESSION['Registro'] = $Registro_Arreglo; //Creo la sesión con el arreglo

if ($Nombre_Error == 1 || $Correo_Error == 1 || $Lada_Error == 1 || $Telefono_Error == 1 
|| $Clave_Error == 1 || $Clave_Reingreso_Error == 1 || $Pais_Error == 1 || $Estado_Error == 1 
|| $Idioma_Error == 1 || $Moneda_Error == 1){
		header("location:index.php");
}else{
	header("location:registrando.php");
}
?>
