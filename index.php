<!DOCTYPE html>
  <head>
<meta charset="utf-8">
<title>ATOM-PROTECT</title>
<link rel="icon" href="css/icon.ico">
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
  <!-- VERIFICACION DE GOOGLE -->
  <meta name="google-site-verification" content="tliIrfJKPsE47AyLUjPnFcR0Lnh_X3CQog8SCCOfbAY" />

<?php
require("class.phpmailer.php");
require("class.smtp.php");

function sendMail(){
$nombre = $_POST["name"];
$correo = $_POST["email"];
$telefono = $_POST["tel"];
$asunto = $_POST["cliente"];
$mensaje = $_POST["msg"];

$destinatario = "";

// Datos de la cuenta de correo utilizada para enviar v�a SMTP
$smtpHost = "smtp.correoseguro.co";  // Dominio alternativo brindado en el email de alta
$smtpUsuario = "";  // Mi cuenta de correo
$smtpClave = "";  // Mi contrase�a

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

// $mail->From = "prueba@atomprotect.com.ar"; // Email desde donde env�o el correo.
$mail->From = "form@atomprotect.com.ar"; // Email desde donde env�o el correo.
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

 <!-- CÓDIGO ANALYTICS -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167804069-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-167804069-1');
</script>


<!-- CÓDIGO GOOGLE REMARKETING -->

<!-- Global site tag (gtag.js) - Google Ads: 690572268 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-690572268"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-690572268');
</script>


<!-- CÓDIGO FB PIXEL -->

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '684474688739781');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=684474688739781&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

  </head>
<body>

<nav class="container col-12">
<img src="css/white.png" alt="" id="nav">
<a href="#complet" id="contacto"><strong>CONTACTO</strong></a>
</nav>
<?php if(isset($alert)):?>

  <div class="alert alert-success container text-center col-xs-10 col-md-4" role="alert">
 <?=$alert?>
 </div>
 <?php endif; ?>


<p class="container text-center col-12 col-md-10"> <br> Mascarilla triple capa: <strong>ANTIBACTERIAL, ANTIVIRAL y ANTIHONGOS. </strong><br>Fabricada con <strong>NANOTECNOLOGÍA.</strong>
  <br>
<br>Efectividad comparable a 15 barbijos descartables, lavable con agua y jabón.<br>
Absorbe la humedad por respiración, habla y tos, protegiendo tu salud y la de tu familia.</p>

<!-- CARRUSEL DE IMAGENES -->
<section class="container col-12">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
  <div class="carousel-item active">
    <img class="d-block w-70" src="css/prod2.jpg" alt="First slide" id="product">
  </div>
  <div class="carousel-item">
    <img class="d-block w-70" src="css/prod3.jpg" alt="Second slide" id="product">
  </div>
  <!-- <div class="carousel-item">
    <img class="d-block w-70" src="css/prod3.jpg" alt="Third slide" id="product">
  </div> -->
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

<!-- <p class="container text-center col-12 col-md-10">Ingresá a nuestra <strong><a href="https://atomprotec.mitiendanube.com/">TIENDA ONLINE</a></strong> o contactate con nosotros.</p> -->
<p class="container text-center col-12 col-md-10"> Un 10% de la producción será donado a beneficio de los sectores mas vulnerables.</p><br>

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
   <textarea name="msg" class="col-xs-12 col-md-8 container text-center" rows="4" placeholder="Escriba su mensaje" required></textarea>
 </div>
 <div class="text-center mt-1 pb-3">
   <button type="submit" name="send" class="btn btn-dark">Enviar</button>
 </div>

 </form>
</section>

<!-- FOOTER -->
<footer class="container col-12">
  <div class="container text-center col-12 d-block ">
    <h1 class="d-block">
      <a href="https://www.facebook.com/AtomProtect"><ion-icon class="a" name="logo-facebook"></ion-icon></a>
      <a href="https://www.instagram.com/atomprotect/"><ion-icon class="a" name="logo-instagram"></ion-icon></a> <br>
    </h1>
  </div>
  <div class="container text-center col-12 d-block">
    <h6><ion-icon name="call-outline"></ion-icon> +54 11 4454 5707 <br>
      <ion-icon name="logo-whatsapp"></ion-icon> +54 9 11 3773 1628 (solo mensajes)</h6>
  </div>
  <div class="container text-center col-12 d-block">
    <h5> KOVI SRL. MORENO 3501</h5>
  </div>

</footer>
<!-- CUIT 30-71088742-6 -->
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>

</html>
