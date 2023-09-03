<?=$cabecera?>

<div class="container my-5 shadow-lg p-3 mb-5 bg-body rounded ">
    <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ingresar Datos del producto:</h5>
                <p class="card-text">
                    <form method="post" action="<?=site_url('/actualizar')?>" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=$producto['id']?>">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input 
                            id="nombre" 
                            value="<?=$producto['nombre']?>" 
                            class="form-control" 
                            type="text" 
                            name="nombre">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion:</label>
                            <input 
                            id="descripcion" 
                            value="<?=$producto['descripcion']?>" 
                            class="form-control" 
                            type="text" 
                            name="descripcion">
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input 
                            id="precio" 
                            value="<?=$producto['precio']?>" 
                            class="form-control" 
                            type="text" 
                            name="precio">
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock:</label>
                            <input 
                            id="stock" 
                            value="<?=$producto['stock']?>" 
                            class="form-control" 
                            type="number" 
                            name="stock">
                        </div>

                        <div class="form-group my-3">
                            <label for="categoria">Categoria:</label>
                            <select class="form-select" aria-label="Default select example" name="categoria">
                                <option selected>Seleccione categoria</option>
                                <?php
                                foreach ($categorias as $categoria) : ?>
                                    <?php if ($categoria['id'] == $producto['id_categoria']) { ?>
                                        <option value="<?=$categoria['id']?>" selected><?=$categoria['nombre']?></option>
                                    <?php } else { ?>
                                        <option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group pl-5 my-4 ">
                            <label for="imagen">Imagen:</label>
                            <div class="text-center">
                                <img class=" text-center img-thumbnail mx-5" 
                                    src="<?=base_url()?>/uploads/<?=$producto['imagen']?>" 
                                    alt="thumbnail"
                                    width=10%;>
                            </div>
                                <br>
                            <input id="imagen" class="form-control my-4" type="file" name="imagen">
                        </div>
                    <div class="my-4 text-center">
                        <button class="btn btn-success" type="subtmit">Guardar</button>
                    </div>
                    </form>            


                </p>
            </div>
    </div>
</div>
<?=$pie?>