<?=$cabecera?>
<?php

//verifica que si el usuario ya ha iniciado sesion no acceda a esta parte

if(session () ->has ('usuario')){
  header("Location: " . base_url('/'));
  exit();
}
?>
    
<div class="vh-100 d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-6 col-sm-8 col-xs-10 mx-auto">
        <div id="loginFrame" class="position-relative">
            <div id="login" class="levelUp shadow bg-white card p-3">
            <h3 class="my-2">Iniciar Sesion</h3>
            <form method="post" action="<?=site_url('iniciar')?>" enctype="multipart/form-data" class='mx-3 my-3'>

              <div class="mb-3">
                <label for="user">Usuario</label>
                <input type="text" required value="<?=old('user')?>" class="mt-2 form-control" id="user" name="user" >
              </div>

              <div class="mb-2 input-group">
                <label class="" for="pass">Contraseña</label>
                <div class="input-group">
                  <input type="password" required class="form-control" name="pass" id="inputPassword">
                  <button type="button" class="btn btn-sm btn-outline-dark" id="togglePassword" onclick="togglePasswordField()">Mostrar</button>
                </div>
              </div>
            
              <div class="mb-2 text-center">
                <button class="btn btn-lg btn-success" type="submit">Iniciar Sesion</button>
              </div>
              
            </form>
            <p>No tienes cuenta? <a class="text-dark" href="<?=site_url('sigin') ?>" >Crea una</a></p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?=$pie?>




