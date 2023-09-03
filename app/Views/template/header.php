<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro Voltaics S.A.</title>
    
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.min.css" >
    <script src="<?=base_url()?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/js/MiJs.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/styles.css">
   
    

    <?php
    $session=session();
    $cart_counter = $session->get('cart_counter');
    $logSesion = $session->get('usuario');
    //si esta logeado
    if($session->has('usuario')){
        // session_destroy();
        // $logSesion = $session->get('usuario');
        // print_r($logSesion);
        $nombre = $logSesion['nombre'];
        $apellido = $logSesion['apellido'];
        
        ?>

        
        <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container-fluid" >
        <a class="navbar-brand" href="https://electrovoltaicss.000webhostapp.com/">Electro Voltaics</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item"><a class="nav-link" href="https://electrovoltaicss.000webhostapp.com/nosotros">Quienes Somos</a></li>    
            <li class="nav-item"><a class="nav-link" href="https://electrovoltaicss.000webhostapp.com/catalogo">Catalogo</a></li>            
            <li class="nav-item"><a class="nav-link" href="https://electrovoltaicss.000webhostapp.com/consulta">Consultas</a></li>            
            <li class="nav-item"><a class="nav-link" href="https://electrovoltaicss.000webhostapp.com/comercializacion">Comercializacion</a></li>            
            <li class="nav-item"><a class="nav-link" href="/https://electrovoltaicss.000webhostapp.com/tyc">Terminos y Condiciones</a></li>
        </div>

        <div>

          <div class="list-unstyled">
              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="<?=base_url()?>/assets/svg/solid/user.svg" width="15wv" alt="logoUser">
                  Hola <?=$nombre?>, <?=$apellido?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="<?=site_url('micuenta')?>">Cuenta</a></li>
                  <li><a class="dropdown-item" href="<?=site_url('mis-compras')?>">Mis Facturas</a></li>
                  <li><a class="dropdown-item" href="<?=site_url('logout')?>">Salir</a></li>
                </ul>
              </li>
          </div>
          
          <div class="text-end">
            <a href="https://electrovoltaicss.000webhostapp.com/carrito"><img src="<?=base_url()?>/assets/svg/solid/cart-shopping.svg" width="20vw" alt="logo-cart"></a>
              
            <?php if($cart_counter>0){ ?>
              <span>(<?=$cart_counter?>)</span>
            <?php } ?> 
            
          </div>
       </div>

      </div>
    </nav>
    
    <?php
    }else{?>
        
      <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container-fluid" >
        <a class="navbar-brand" href="https://electrovoltaicss.000webhostapp.com/">Electro Voltaics</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="https://electrovoltaicss.000webhostapp.com/contacto">Contacto</a></li>
            <li class="nav-item"><a class="nav-link" href="https://electrovoltaicss.000webhostapp.com/nosotros">Quienes Somos</a></li>    
            <li class="nav-item"><a class="nav-link" href="https://electrovoltaicss.000webhostapp.com/catalogo">Catalogo</a></li>            
            <li class="nav-item"><a class="nav-link disabled" href="https://electrovoltaicss.000webhostapp.com/consulta">Consultas</a></li>            
            <li class="nav-item"><a class="nav-link" href="https://electrovoltaicss.000webhostapp.com/comercializacion">Comercializacion</a></li>            
            <li class="nav-item"><a class="nav-link" href="https://electrovoltaicss.000webhostapp.com/tyc">Terminos y Condiciones</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <?php
        // Carga la clase URI
        $uri = service('uri');
        
        // Obtén la URI actual
        $currentUri = $uri->getPath();
        
        // Define la URI de la página que deseas verificar
        $paginaLogin = 'login';
        
        // Comprueba si la URI actual contiene la cadena "/login"
        if (strpos($currentUri, $paginaLogin) !== false) {
            // Estoy en la página "/login"
        } else {
        ?>
            <div class="text-center">
                  <a class="text-dark fs-6" href="<?=base_url('login')?>">Iniciar Sesion</a>    
                </div> 
        <?php
        }
        
        ?>
        
        
      </div>
    </nav>
<?php
    }
      
    ?>
    

</head>
<body>
<?php if(session('mensaje')){?>

<div class="alert alert-danger text-center" role="alert">
<p class="fs-5">
      <?php 
        echo session('mensaje');
      ?>
    </p>
</div>


<?php
}?>
  
  <?php if(session('aviso')){?>

<div class="alert alert-success text-center" role="alert">
<p class="fs-5">
      <?php 
        echo session('aviso');
      ?>
    </p>
</div>


<?php
}?>
<?php if(session('stock')){?>

  <div class="alert alert-danger text-center" role="alert">
  <img class="mx-2 text-center" src="assets/svg/solid/triangle-exclamation.svg" alt="thumbail" width="1%">
  
    <p class="fs-5">
      <?php 
        echo session('stock');
      ?>
    </p>

  </div>



<?php
}?>

    
