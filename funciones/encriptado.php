<? 
      error_reporting ( E_ERROR );
/*
---------------------------------------------------------------------------
LIBRERIA DE ENCRIPTADO
Esta librería se encarga de encriptar y desencriptar datos.
---------------------------------------------------------------------------
*/
function Desencriptar($Dato_Desencriptar) {
   $llave=substr($Dato_Desencriptar, 0, 7);
   $adesencriptar=str_replace($llave, "", $Dato_Desencriptar);
   $desencriptada=base64_decode($adesencriptar);
   $desencriptadofinal=str_replace($llave, "", $desencriptada);
   Return $desencriptadofinal;
}

function Encriptar($Dato_Encriptar) {
   $llave = rand(1000000,9999999);
   $variableencriptar = "".$llave."".$Dato_Encriptar;
   $codificado = base64_encode($variableencriptar);
   $encriptadofinal = "".$llave."".$codificado."";
   Return $encriptadofinal;
}

?>
