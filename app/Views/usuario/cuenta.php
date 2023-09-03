<?=$cabecera?>
<?php
$session = session();
if( !($session->has('usuario')) ){
    header("Location: " . base_url('/'));
    exit();
}
$userData = $session ->get ('usuario');
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

        <div class="input-group mb-3 col-md-6 col-sm-6">
        <span class="input-group-text" id="basic-addon1">Nombre</span>
        <input type="text" disabled class="form-control" value="<?=$nombre?>" aria-label="Username" aria-describedby="basic-addon1">
        <span class="input-group-text" id="basic-addon1">Apellido</span>
        <input type="text" disabled class="form-control" value="<?=$apellido?>" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3 col-md-6 col-sm-6">
        <span class="input-group-text" id="basic-addon1">Correo </span>
        <input type="text" disabled class="form-control" value="<?=$email?>" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3 col-md-6 col-sm-6">
        <span class="input-group-text" id="basic-addon1">Usuario</span>
        <input type="text" disabled class="form-control" value="<?=$usuario?>" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3 col-md-6 col-sm-6">
        <span class="input-group-text" id="basic-addon1">Contraseña</span>
        <input type="text" disabled class="form-control" value="•••••••••••••••••" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="text-center">
            <a href="<?= base_url('edicionCuenta')?>"><button class="btn btn-success" type="button">Modificar Datos</button></a>
        </div>
    </div>
</div>
<br>
<br>
<br>


<?=$pie?>