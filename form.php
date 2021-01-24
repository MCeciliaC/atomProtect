<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>ATOM-PROTECT | CONTACTO</title>
  <?php
    include 'statics.php';
    require("sendmail.php");
  ?>
</head>

<body>
<?php include 'nav.php' ?>

<!-- ALERT -->
<?php if(isset($alert)):?>
  <style media="screen">
    #complet, footer, nav {
      display:none;
    }
  </style>
  <div class="alert alert-success container text-center col-xs-10 col-md-4" role="alert">
    <?=$alert?>
    <?php if($alert==true): ?>
    <h5>
      <a class="a" href="index.php">Volver al inicio</a>
    </h5>
  <?php else: ?>
    <h5>
      <a class="a" href="form.php">Intentar nuevamente</a><br> <a class="a" href="index.php">Volver al inicio</a>
    </h5>
  <?php endif; ?>
 </div>
 <?php endif; ?>

<!-- FORMULARIO -->
<section class="container col-10 col-lg-8 col-xl-6 box" id="complet">
  <form action="" method="post" name="form"  autocomplete="off">
    <div class="container text-center form-group col-sm-12 col-lg-8">
      <label for="name" class="container text-center mb-3">Envíanos tu consulta</label>
      <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required/>
    </div>
    <div class="container text-center form-group col-sm-12 col-lg-8">
      <label for="email"></label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Email" required/>
    </div>
    <div class="container text-center form-group col-sm-12 col-lg-8">
      <label for="cliente"></label>
      <select class="form-control col-12" name="cliente" id="cliente">
        <option value="Particular">Particular</option>
        <option value="Distribuidor">Distribuidor</option>
        <option value="Institución">Institución</option>
      </select>
    </div>
    <div class="form-group col-12 container text-center">
      <label for="msg"></label>
      <textarea name="msg" class="col-xs-12 col-md-8 container text-center" rows="3" placeholder="Escriba aquí su mensaje..." required></textarea> <br>
    </div>
    <h6 class="container text-center col-12 col-md-12 mt-1"><a class="b" href="faq.php">Preguntas frecuentes</a></h6>
    <div class="text-center mt-1 pb-3">
      <button type="submit" name="send" class="sub btn btn-dark mb-4">Enviar</button>
    </div>
  </form>
</section>
<?php include 'footer.php' ?>
</body>
</html>
