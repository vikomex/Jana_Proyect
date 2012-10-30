<?php
$Pais = $_POST['Pais'];
$Estado = $_POST['Estado'];
require_once "../funciones/conexion.php";
require_once "../funciones/formato.php";
require_once "../funciones/validacion.php";
switch ($Pais) { 
case "1": 
$Consulta_Listado_Mexico = mysql_query("SELECT opcion FROM listado_mexico ORDER BY id");?>
<select name="Estado" id="Estado">
    <option value="-1">- selecciona el estado -</option>
<? while ($Opcion = mysql_fetch_array($Consulta_Listado_Mexico)){ ?>
	 <option  value="<? echo $Opcion['opcion']; ?>"<? Validacion_Select($Opcion['opcion'], $Estado) ?>><? echo Retirar_Coma($Opcion['opcion']); ?></option> 
<? } mysql_free_result($Consulta_Listado_Mexico); ?>
</select> <br />
 <? break; 
 case "2": 
$Consulta_Listado_Paises = mysql_query("SELECT opcion FROM listado_paises ORDER BY id");?>
<select name="Estado" id="Estado">
    <option value="-1">- selecciona el País -</option>
<? while ($Opcion = mysql_fetch_array($Consulta_Listado_Paises)){ ?>
	 <option  value="<? echo $Opcion['opcion']; ?>"<? Validacion_Select($Opcion['opcion'], $Estado) ?>><? echo $Opcion['opcion']; ?></option> 
<? } mysql_free_result($Consulta_Listado_Paises); ?>
</select> <br />
<? 
  break;
	default:  
		echo "<input type='hidden' name='Estado' id='Estado' value='-1'/>";	
		break;
}
?>
</body>
</html>