<?=$cabecera?>
<?php

//verifica que si el usuario ya ha iniciado sesion no acceda a esta parte
if(session () ->has ('usuario')){
  $session = session();
  $log = $session->get('usuario');
  
  //si es admin, no puede acceder al panel principal, solo al panel admin
  if($log['perfil_id'] == 2){
    header("Location: " . base_url('inicio'));
    exit();
  }
}

?>

<body>
  <section class="container-fluid p-0" id="home">
    <div class="position-relative  text-center">
      <img class="img-style mx-auto w-50" src="assets/img/principal.jpeg"  alt="fotoPrincipal">
      <div class="position-absolute top-50 start-50 translate-middle">
        <h1 class="titulo" id="color-changing-text">Electro Voltaics</h1>
        <p class="subtitulo display-2">El mejor aliado en tus proyectos electricos</p>
    </div>
  </section>
  

  <section id="home">
    <div class="separador  rounded-pill"></div>
    <h1 class="secundario text-dark text-center">Somos uno de los fabricantes de bateria mas importantes</h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/img1.jpeg" class="d-block w-30 mx-auto carrfoto" alt="Imagen 1">
        </div>
        <div class="carousel-item">
          <img src="assets/img/img2.jpeg" class="d-block w-30 mx-auto carrfoto" alt="Imagen 2">
        </div>
        <div class="carousel-item">
          <img src="assets/img/img3.jpg" class="d-block w-10 mx-auto carrfoto" alt="Imagen 3">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Siguiente</span>
      </a>
    </div>
    <div class="separador  rounded-pill"></div>
    <div class="presentacion text-center">
      <h2>Abocados en ayudarte en diversos sectores</h2>
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
              <img src="assets/img/tipo1.jpeg" class="card-img-top" alt="tipo1">
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
              <img src="assets/img/tipo2.jpeg" class="card-img-top" alt="tipo2">
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-4"> <!--Investigar como funciona -->
            <div class="card">
              <img src="assets/img/tipo3.jpeg" class="card-img-top" alt="tipo3">
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
              <img src="assets/img/tipo4.jpeg" class="card-img-top img-custom" alt="tipo4">
            </div>
          </div>
  </section>

  <?=$pie?> 