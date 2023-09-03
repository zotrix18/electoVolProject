<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro Voltaics S.A.</title>
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>" integrity=" " crossorigin="">
    <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
    <link rel="stylesheet" href="<?=base_url('assets/css/styles.css')?>">
    
    

    <?php
    $session=session();
    //variable q contiene los datos del usuario logeado
    $logSesion = $session->get('usuario');
    if($logSesion['perfil_id']==1){
        header("Location: " . base_url('/'));
        exit();
    }
    $nombre = $logSesion['nombre'];
    $apellido = $logSesion['apellido'];
    ?>

    <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container-fluid" >
        <a class="navbar-brand" href="<?=site_url('inicio')?>">Electro Voltaics - Panel ADMIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="<?=site_url('productosAdmin')?>">Productos</a></li>    
            <li class="nav-item"><a class="nav-link" href="<?=site_url('categoriasAdmin')?>">Categorias</a></li>  
            <li class="nav-item"><a class="nav-link" href="<?=site_url('usuariosAdmin')?>">Usuarios</a></li>            
            <li class="nav-item"><a class="nav-link" href="<?=site_url('contactos')?>">Contactos</a></li>            
            <li class="nav-item"><a class="nav-link" href="<?=site_url('consultas')?>">Consultas</a></li>            
            <li class="nav-item"><a class="nav-link" href="<?=site_url('facturas')?>">Facturas</a></li>            
              </ul>
            </li>
          </ul>

        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <div class="text-center">
              <p> Hola <?=$nombre?>, <?=$apellido?> (ADMIN)</p>
              <a href="<?=site_url('logout')?>">Salir</a>
          </div>  
        </div>
      </div>
    </nav>

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