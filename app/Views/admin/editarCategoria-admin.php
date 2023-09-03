<?=$cabecera?>

<div class="container my-5 shadow-lg p-3 mb-5 bg-body rounded ">
    <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ingresar Datos de categoria:</h5>
                <p class="card-text">
                <form method="post" action="<?=site_url('/actualizarCategoria')?>" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=$categoria['id']?>">

                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input 
                        id="nombre" 
                        value="<?=$categoria['nombre']?>" 
                        class="form-control" 
                        type="text" 
                        name="nombre">
                    </div>

                    <div class="my-4 text-center">
                        <button class="btn btn-success" type="subtmit">Guardar</button>
                    </div>
                </form>
            </div>
    </div>
</div>

<?=$pie?>