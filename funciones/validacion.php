<? 
/*
---------------------------------------------------------------------------
LIBRERIA DE VALIDACIONES
Esta librería se encarga de regresar selects y checkboxes los campos ingresados.
---------------------------------------------------------------------------
*/
function Validacion_Select($campo, $valor){
	if(!strcmp($campo, $valor)){
    echo "selected=\"selected\"";
		}else{
		return "";
		}
}
	
function Validacion_Checkbox($campo, $valor){
	if(!strcmp($campo, $valor)){
    echo "checked=\"checked\"";
		}else{
		return "";
		}
}

?>