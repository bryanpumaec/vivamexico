<?php
$codigo=rand(100000,999999);

$message = '';
              /* CORREO ELECTRÓNICO */
              $to      = $email; // Enviar Email al usuario
              $subject = 'Restablecer contraseña'; // Darle un asunto al correo electrónico
              $message = '
               
              Estas a punto de restablecer tu contraseña!
              
              Restablece tu contraseña utilizando el código que se indica a continuación.
               
              ------------------------
              Código de restablecimiento: '.$codigo.'
              ------------------------
               
              Para restablecer tu contraseña da clic aquí!
              <p><a href="https://vivamexico.ec/verificarPass.php?email='.$email.'&token='.$token.'"></a></p>
              
              Gracias por visitar Viva México EC
              '; // Aqui se incluye la URL para ir al mensaje
                                   
              $headers = 'From:accounts@vivamexico.ec' . "\r\n"; // Colocar el encabezado
              $enviado=false;
              if(mail($to, $subject, $message, $headers)){
                $enviado=true;
              } // Enviar el correo electrónico
                  /* CORREO ELECTRÓNICO */
?>