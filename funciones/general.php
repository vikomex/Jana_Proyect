<? 
	   error_reporting ( E_ERROR );
/*
---------------------------------------------------------------------------
LIBRERIA DE GENERALES
Esta librería se encarga de generalidades.
---------------------------------------------------------------------------
*/
function Asigna_UTF($str) {
    $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
    return ($str);
}

function Codigo_Seguridad(){
	$longitud = 10;
	$conjunto_caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890*.+=-_#&";
	$str = "";   
   for ( $i = 0; $i < $longitud; $i++){
      $str .= $conjunto_caracteres{rand() % strlen( $conjunto_caracteres)};
   }
   return md5($str);
}
  
function Dominio($correo){
  $exploto = explode("@", $correo);
  return $exploto[1]; 
  }

function Entrada_Texto($cadena){
  $trimea = trim($cadena);
  $stripea = strip_tags($trimea);
    return $stripea;
}

function Idioma_Var($var){
  if($var == 1){
    return "Español";
  }elseif($var == 2){
    return "English";
  }
}

function Mayusculas($string){ 
  return Entrada_Texto(strtr(strtoupper($string), array( 
      "à" => "À", 
      "è" => "È", 
      "ì" => "Ì", 
      "ò" => "Ò", 
      "ù" => "Ù", 
      "á" => "Á", 
      "é" => "É", 
      "í" => "Í", 
      "ó" => "Ó", 
      "ú" => "Ú", 
      "â" => "Â", 
      "ñ" => "Ñ", 
      "ê" => "Ê", 
      "î" => "Î", 
      "ô" => "Ô", 
      "û" => "Û", 
      "ç" => "Ç", 
    ))); 
}

function Moneda_Var($var){
  if($var == 1){
    return "Pesos Mexicanos";
  }elseif($var == 2){
    return "Dolares Americanos";
  }
}

function Primera_Mayuscula($string){ 
  $var = strtr(strtolower($string), array( 
      "À" => "à", 
      "È" => "è", 
      "Ì" => "ì", 
      "Ò" => "ò", 
      "Ù" => "ù", 
      "Á" => "á", 
      "É" => "é", 
      "Í" => "í", 
      "Ó" => "ó", 
      "Ú" => "ú", 
      "Â" => "â", 
      "Ñ" => "ñ", 
      "Ê" => "ê", 
      "Î" => "î", 
      "Ô" => "ô", 
      "Û" => "û", 
      "Ç" => "ç", 
    )); 
	return Asigna_UTF(Entrada_Texto($var));
} 

function Primera_Palabra($var){
	$exploto = explode(" ", $var);
	return $exploto[0];
	}
				
function Rol_Var($var){
	if($var == 1){
		return "Usuario";
	}elseif($var == 2){
		return "Club Canófilo";
	}elseif($var == 3){
		return "Administrador";
  }
}
?>