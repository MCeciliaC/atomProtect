<!DOCTYPE html>
  <head>
<meta charset="utf-8">
<title>ATOM-PROTECT</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- js, popper y jquery -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <!-- GOOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Lato&display=swap" rel="stylesheet">

<?php
require("class.phpmailer.php");
require("class.smtp.php");

function sendMail(){
  $nombre = $_POST["name"];
  $correo = $_POST["email"];
  $telefono = $_POST["tel"];
  $asunto = $_POST["cliente"];
  $mensaje = $_POST["msg"];

  $destinatario = "info@example.com.ar";

  // Datos de la cuenta de correo utilizada para enviar v�a SMTP
  $smtpHost = "smtp.correoseguro.co";
  $smtpUsuario = "example@example.com.ar";
  $smtpClave = "clave";

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


  $mail->From = "form@example.com.ar";
  $mail->FromName = $nombre;
  $mail->AddAddress($destinatario); // Esta es la direcci�n a donde enviamos los datos del formulario

  $mail->Subject = "Formulario desde el Sitio Web"; // Este es el titulo del email.
  $mensajeHtml = nl2br($mensaje);
  $mail->Body = "
  <html>
  <body>
  <p>Informacion enviada por el usuario de la web:</p>

  <p>nombre: {$nombre}</p>
  <p>cliente: {$asunto}</p>
  <p>email: {$correo}</p>
  <p>telefono: {$telefono}</p>
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

  </head>
<body>

<nav class="container col-12">
<img src="css/white.png" alt="" id="nav">
<a href="#complet" id="contacto"> <strong>CONTACTO</strong></a>
</nav>
<?php if(isset($alert)):?>

  <div class="alert alert-success container text-center col-xs-10 col-md-4" role="alert">
 <?=$alert?>
 </div>
 <?php endif; ?>


<p class="container text-center col-12 col-md-10"> <br> Mascarilla triple capa: <strong>ANTIBACTERIAL, ANTIVIRAL y ANTIHONGOS. </strong><br>Fabricada con <strong>NANOTECNOLOGÍA.</strong>
  <!-- , con la colaboración de científicos del <strong>CONICET</strong>.  -->
  <br>
<br>Efectividad superior a <strong>30 BARBIJOS DESCARTABLES</strong>, lavable con agua y jabón.<br>
Absorve la humedad por respiración, habla y tos, protegiendo tu salud y la de tu familia.</p>

<!-- CARRUSEL DE IMAGENES -->
<section class="container col-12">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
  <div class="carousel-item active">
    <img class="d-block w-70" src="css/prod1.jpg" alt="First slide" id="product">
  </div>
  <div class="carousel-item">
    <img class="d-block w-70" src="css/prod2.jpg" alt="Second slide" id="product">
  </div>
  <div class="carousel-item">
    <img class="d-block w-70" src="css/prod3.jpg" alt="Third slide" id="product">
  </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</section>

<p class="container text-center col-12 col-md-10">Ingresá a nuestra <strong><a href="https://atomprotec.mitiendanube.com/">TIENDA ONLINE</a></strong> o contactate con nosotros.</p>
<p class="container text-center col-12 col-md-10">Parte de la producción será donada a acción social a beneficio de los mas vulnerables.</p><br>

<!-- FORMULARIO -->
 <section class="container col-10 col-lg-8 mt-5 box" id="complet">
 <form action="" method="post" name="form"  autocomplete="off">
 <p class="container text-center col-12 col-md-12"> Completá el formulario y nos contactaremos a la brevedad</p>
 <div class="form-group col-12">
   <label for="name">Nombre:</label>
   <input type="text" id="name" name="name" class="form-control" placeholder="Escribe tu nombre" required/>
 </div>
 <div class="form-group col-12">
   <label for="email">Correo electrónico:</label>
   <input type="email" id="email" name="email" class="form-control" placeholder="Escribe tu email" required/>
 </div>
 <div class="form-group col-12">
   <label for="tel">Teléfono:</label>
   <input type="tel" id="tel" name="tel" class="form-control" placeholder="Escribe tu teléfono" required/>
 </div>
 <div class="form-group col-12">
 <label for="cliente">Cliente</label> <br>
  <select class="form-control col-12" name="cliente" id="cliente">
    <option value="Distribuidor">Distribuidor</option>
    <option value="Institución">Institucion</option>
    <option value="Particular">Particular</option>
  </select>
  </div>
 <div class="form-group col-12 container text-center">
  <label for="msg">Mensaje:</label> <br>
   <textarea name="msg" class="col-xs-12 col-md-8 container text-center" rows="5" placeholder="Deje aquí su consulta" required></textarea>
 </div>
 <div class="text-center mt-1 pb-3">
   <button type="submit" name="send" class="btn btn-dark">Enviar</button>
 </div>

 </form>
</section>

<!-- FOOTER -->
<footer class="container col-12">
<div class="container col-xs-12 col-md-6 d-block float-left">
  <h6><ion-icon name="call-outline"></ion-icon>+54 11 4454 5707<br><ion-icon name="logo-whatsapp"></ion-icon>+54 9 11 3773 1628 (solo mensajes)</h6>
</div>
<div class="container col-xs-12 col-md-6 d-block float-md-right">
  <h5 class="float-md-right"> KOVI SRL. MORENO 3501</h5>
 </div>
</footer>
<!-- CUIT 30-71088742-6 -->
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>

</html>
