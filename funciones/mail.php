<?php
function MailSMTP($Correo, $Asunto, $Mensaje){
require_once('class.phpmailer.php');
$mail             = new PHPMailer();
$body             = $Mensaje;
$mail->IsSMTP();
$mail->Host       = "mail.expopek.com.mx"; 
$mail->SMTPDebug  = 1;                    
$mail->SMTPAuth   = true;    
$mail->SMTPSecure = "ssl";                 
$mail->Host       = "smtp.gmail.com";    
$mail->Port       = 465;                  
$mail->Username   = "info@expopek.com.mx";  
$mail->Password   = "Y8631753h31DM14";       
$mail->SetFrom('info@expopek.com.mx', 'ExpoPek.com.mx');
$mail->AddReplyTo("info@expopek.com.mx","ExpoPek.com.mx");
$mail->CharSet = "UTF-8";
$mail->Subject    = $Asunto;
$mail->MsgHTML($Mensaje);
$address = $Correo;
$mail->AddAddress($address);
$mail->Send();
}
?>
</body>
</html>
