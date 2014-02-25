<?php
        // Proceso para envio del mail de contacto
        $comentario = "<table width='520' border='0' cellpadding='0' cellspacing='2'>
            <tr>
                <td bgcolor='#FFFFFF'><img src='http://www.tallereslagarantia.com/img/logo.png'/>
                    <table width='100%' border='0' align='center' cellpadding='10' bgcolor='#CCCCCC'>
                        <tr>
                            <td bgcolor='#FFFFFF' style='font-size:12px;font-family:Arial, Helvetica, sans-serif'>
                                <p>Un nuevo formulario de contacto ha sido enviado, he aqu&iacute; los datos:</p>
                                <p>
                                    <strong>Nombre:</strong> $nombre<br/>
		                            <strong>Apellido:</strong> $apellido<br/>
                                    <strong>C&eacutedula:</strong> $cedula<br/>
                                    <strong>Fecha de Nacimiento:</strong> $fecha_nacimiento<br/>
                                    <strong>Ciudad:</strong>$nombreCiudad<br/>		
                                    <strong>T&eacutelefono:</strong>$telefono<br/>
                                    <strong>Correo:</strong> $emailCliente<br/>		
                                    <strong>Motivo:</strong> $motivo<br/>	
                                    <strong>Mensaje:</strong> $mensaje<br/>
                                </p>
                                <p align='center'>------------------------------------------------------</p>
                                <p>
                                    Este mensaje fue generado desde el formulario de Contacto en: <a href='http://www.tallereslagarantia.com/vista_contactenos.php'>http://www.tallereslagarantia.com/vista_contactenos.php</a><br />
                                    Y fue enviado por  $nombre $apellido ($emailCliente)
                                </p> 
                                <p align='center'>
                                    <a href='http://www.tallereslagarantia.com'>
                                        <img src='http://www.tallereslagarantia.com/img/correo/btn_visita.png' width='158' height='26' border='0' />
                                    </a>
                                </p>
                                <p style='font-size:10px;color:#666666;'>
                                    Favor no responda a este e-mail. Todo el contenido de este bolet&iacute;n es enviado a nuestros usuarios con el objetivo exclusivamente informativo. Pol&iacute;tica de Privacidad: Las direcciones de e-mail facilitadas por nuestros usuarios son utilizadas exclusivamente para el correo y en ning&uacute;n caso son suministradas a terceros.
                                </p>
                                <p align='center' style='font-weight:bold; font-size:11px;color:#666666;'>
                                    Talleres La Garant&iacute;a S.A<br />
                                    Si desea contactarse con nosotros h&aacute;galo al:<br />
                                    (593) 04-292 2601
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>";    

        $mensaje=	"".$comentario;
					
        $emailCorp = "peter.concha@outlook.com";
  
        // Mail de confirmacion de contacto para el cliente
        $_subject =  "Nuevo Mensaje La Garantia";
        $message = "<p>".$mensaje ." </p><br />";
        $headers = "";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=charset=utf-8\r\n";
        $headers .= "To: $emailCliente \r\n";
        $headers .= "From: $emailCorp \r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $mailResponse = mail (
            "$emailCliente"
            , "$_subject"
            , "$message"
            , "$headers"
        );

        if ($mailResponse)
        { echo ""; }
        else 
        { echo "success=no"; }
					
        $headers = "";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=charset=utf-8\r\n";
        $headers .= "To: $emailCorp \r\n";
        $headers .= "From: $emailCliente \r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $mailResponse1 = mail (
            "$emailCorp"
            , "$_subject"
            , "$message"
            , "$headers"
        );
        if ($mailResponse1)
        { } 
        else
        { echo "success=no"; }
?>
