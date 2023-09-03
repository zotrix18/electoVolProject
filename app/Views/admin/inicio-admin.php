<?=$cabecera?>


<?php
$session=session();
    $session=session();
    //variable q contiene los datos del usuario logeado
    $logSesion = $session->get('usuario');
    $nombre = $logSesion['nombre'];
    $apellido = $logSesion['apellido'];
?>

    
    <div class="container-fluid my-5 py-5 text-center">
        <h2>Bienvenido <?=$nombre?>, <?=$apellido?> (ADMIN)</h2>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
<?=$pie?>