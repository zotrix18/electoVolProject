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
            <div id="signup" class="levelDown shadow bg-white card p-3">
                <h3 class="my-2 text-center">Registro</h3>
                <form action="<?=site_url('/registrar')?>" enctype="multipart/form-data" method="post" class='mx-3 my-3'>
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" required value="<?=old('nombre')?>" class="mt-2 form-control" id="nombre" placeholder="Ingresa tu nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" required value="<?=old('apellido')?>" class="mt-2 form-control" id="apellido" placeholder="Ingresa tu apellido" name="apellido">
                </div>
                <div class="mb-3">
                    <label for="email">Correo</label>
                    <input type="email" required value="<?=old('email')?>" class="mt-2 form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="user">Usuario</label>
                    <input type="text" required value="<?=old('user')?>" class="mt-2 form-control" id="user" name="user">
                </div>
                <div class="mb-4">
                    <label for="pass">Contraseña</label>
                    <input type="password" value="<?=old('pass')?>" required  class="mt-2 form-control" id="pass" name="pass">
                </div>
                <div class="mb-2">
                    <button  class="btn btn-lg btn-primary w-100" type="submit" >Registrarse</button>
                </div> 
                </form>
          </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<?=$pie?>