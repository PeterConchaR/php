<?php
// Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
$headers = "From: $nombre <$email>\r\n";  
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

   if(mail($dest,$asunto,$cuerpo,$headers)){ // esta es una comparacion para ver si envio el mail o no (\r\n = salto de linea)
        $result = '<div class="result_ok">Email enviado correctamente</div>';   
 // si el envio fue exitoso reseteamos lo que el usuario escribio:
        $_POST['nombre'] = '';
        $_POST['email'] = '';
        $_POST['asunto'] = '';
        $_POST['mensaje'] = '';
    }else{
        $result = '<div class="result_fail">Hubo un error al enviar el mensaje</div>';
    }

?>
