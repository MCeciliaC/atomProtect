<?php
require("class.phpmailer.php");
require("class.smtp.php");

function sendMail(){
  $nombre = $_POST["name"];
  $correo = $_POST["email"];
  $asunto = $_POST["cliente"];
  $mensaje = $_POST["msg"];

  $destinatario = "info@atomprotect.com.ar";

  // Datos de la cuenta de correo utilizada para enviar v�a SMTP
  $smtpHost = "smtp.correoseguro.co";  // Dominio alternativo brindado en el email de alta
  $smtpUsuario = "prueba@atomprotect.com.ar";  // Mi cuenta de correo
  $smtpClave = "123456";  // Mi contrase�a

  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure="TLS";
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->CharSet = "utf-8";

  // VALORES A MODIFICAR //
  $mail->Host = $smtpHost;
  $mail->Username = $smtpUsuario;
  $mail->Password = $smtpClave;

  $mail->From = "form@atomprotect.com.ar"; // Email desde donde env�o el correo.
  $mail->FromName = $nombre;
  $mail->AddAddress($destinatario); // Esta es la direcci�n a donde enviamos los datos del formulario

  $mail->Subject = "Atom Protect"; // Este es el titulo del email.
  $mensajeHtml = nl2br($mensaje);
  $mail->Body = "
  <html>
  <body>
  <p>Informacion enviada por el usuario de la web:</p>

  <p>nombre: {$nombre}</p>
  <p>cliente: {$asunto}</p>
  <p>email: {$correo}</p>

  <p>mensaje: {$mensaje}</p>
  </body>
  </html>

  <br />"; // Texto del email en formato HTML
  $mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
  // FIN - VALORES A MODIFICAR //

  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );

  $estadoEnvio = $mail->Send();
  if($estadoEnvio){
      return "El correo fue enviado exitosamente.";
  } else {
      return "Ocurrio un error inesperado. Intente mas tarde";
  }
}

if($_POST){
  $alert= sendMail();
}
 ?>
