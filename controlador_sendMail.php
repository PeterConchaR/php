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

//Enviar el estado del envio (por metodo GET ) y redirigir navegador al archivo index.php
        if($seEnvio == true)
    {
        header('Location: index.php?estado=enviado');
    }
    else
    {
        header('Location: index.php?estado=no_enviado');
    }

<?php
// Varios destinatarios
$para  = 'aidan@example.com' . ', '; // atención a la coma
$para .= 'wez@example.com';

// subject
$titulo = 'Recordatorio de cumpleaños para Agosto';

// message
$mensaje = '
<html>
<head>
  <title>Recordatorio de cumpleaños para Agosto</title>
</head>
<body>
  <p>¡Estos son los cumpleaños para Agosto!</p>
  <table>
    <tr>
      <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
    </tr>
    <tr>
      <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($para, $titulo, $mensaje, $cabeceras);
?>
