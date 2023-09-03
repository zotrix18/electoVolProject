<?=$cabecera?> 
<?php

//verifica que si el usuario ya ha iniciado sesion no acceda a esta parte
if(session () ->has ('usuario')){
  header("Location: " . base_url('/'));
  exit();
}

?>
<body>
<h2 class="text-center">¡Ponete en contacto con nosotros!</h2>
<div class="container-fluid py-5 my-5">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-5 text-center">
        <iframe class="w-75 h-75" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d442.51552329872135!2d-58.785951055193415!3d-27.465392899999973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b1e7c96546f%3A0x5fd8545ab4c46264!2sAv.%20Libertad%205251%2C%20W3402%20Corrientes!5e0!3m2!1ses-419!2sar!4v1682382082279!5m2!1ses-419!2sar"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p class="mb-0 ">Titular: Quintana Facundo</p>
            <p class="mb-0">Av. Libertad 5289</p>
            <p class="mb-0">Tel.: +54 3795334455</p>
        </div>
          <div class="col-sm-12 col-md-6 col-lg-7 border border-dark shadow p-3 mb-5 bg-body rounded">
          <form action="<?=site_url('/mensajeContacto')?>" enctype="multipart/form-data" method="post" class='mx-3 my-3'>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" value="<?=old('nombre')?>" id="nombre" name="nombre" class="form-control border border-secondary "  required id="nombre" placeholder="Nombre completo">
                </div>
                <br>
                <div class="container">
                    <div class="row">
                    <div class="col-sm-4 .col-1">
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                <label for="prefijo">Prefijo:</label>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">+</span>
                                <input type="number" value="<?=old('prefijo')?>" id="prefijo" name="prefijo" class="form-control border border-secondary" min="0" required placeholder="Prefijo">
                            </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-8 .col-11">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" id="telefono" name="telefono" value="<?=old('telefono')?>" class="form-control border border-secondary" min="0" required placeholder="Numero telefono sin 015">
                        </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" required value="<?=old('email')?>" class="mt-2 border border-secondary form-control" id="email" name="email">
                </div>
                <br>
                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input type="text" required id="asunto" name="asunto" value="<?=old('asunto')?>" class="form-control border border-secondary"   placeholder="Asunto">
                </div>
                <br>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea required id="Descripcion"  name="descripcion" value="<?=old('descripcion')?>" class="form-control border border-secondary" rows="5"  placeholder="Describa brevemente su consulta"></textarea>
                </div>
                <br>  
                <div class="form-check">
                    <input type="checkbox"  required class="form-check-input border border-secondary" id="leido">
                    <label class="form-check-label" for="leido">He leido los <a href="http://localhost/proyecto_quintana/public/tyc">términos y condiciones de la página</a> </label>
                </div>
                <div class="separar text-center pt-5">
                    <button type="submit button" class="btn btn-primary" ><span class="submit-boton button btn btn-primary">Enviar</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?=$pie?>