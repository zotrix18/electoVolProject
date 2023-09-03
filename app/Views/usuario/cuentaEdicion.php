<?=$cabecera?>
<?php
$session = session();
if( !($session->has('usuario')) ){
    header("Location: " . base_url('/'));
    exit();
}
$userData = $session ->get ('usuario');
$id = $userData['id'];
$nombre = $userData['nombre'];
$apellido = $userData['apellido'];
$email = $userData['email'];
$usuario = $userData['usuario']; 

?>
<br>
<br>
<div>
    <div class="sep shadow-lg p-3 m-5 bg-body rounded row">
        <h2 class="m-4">Mis datos</h2>

    <form method="post" action="<?=site_url('actualizarCuenta')?>" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?=$id?>">

        <div class="input-group mb-3 col-md-6 col-sm-6">
            <span class="input-group-text" id="basic-addon1">Nombre</span>
            <input type="text" class="form-control" value="<?=$nombre?>" name="nombre">
            <span class="input-group-text" id="basic-addon1">Apellido</span>
            <input type="text" class="form-control" value="<?=$apellido?>" name="apellido">
            </div>

            <div class="input-group mb-3 col-md-6 col-sm-6">
            <span class="input-group-text" id="basic-addon1">Correo </span>
            <input type="text" class="form-control" value="<?=$email?>" name="correo">
            </div>

            <div class="input-group mb-3 col-md-6 col-sm-6">
            <span class="input-group-text" id="basic-addon1">Usuario</span>
            <input type="text" class="form-control" value="<?=$usuario?>" name="usuario">
            </div>

            <div class="input-group mb-3 col-md-6 col-sm-6">
            <span class="input-group-text" id="basic-addon1">Contraseña</span>
            <input type="password" placeholder="••••••••••" class="form-control" name="contraseña" id="inputPassword">
            <button type="button" id="togglePassword" class="btn btn-sm btn-outline-dark" onclick="togglePasswordField()">Mostrar</button>
            </div>

            <div class="mb-2 text-center">
                <button class="btn btn-success" type="submit" >Guardar</button>
            </div> 
    </form>

        
    </div>
</div>
<br>
<br>
<br>



<?=$pie?>