<?=$cabecera?>

<br>
<br>


<div class="shadow p-3 mb-5 mx-5 bg-body rounded conteiner">
  
  <div class="row align-items-center">

    <div class="col-md-3 col-sm-6 ml-5 text-center">
      <a class="btn btn-outline-success btn-sm m-2" href="<?=base_url('/añadir')?>" >Añadir Producto</a>
    </div>

    <div class="col-md-3 col-sm-6 text-center">
      <form method="get" action="<?= base_url('productosAdmin') ?>" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Buscar por nombre" name="buscar_nombre">
          <button class="btn btn-outline-success btn-sm" type="submit">Buscar</button>
        </div>
      </form>

    </div>

    <div class="col-md-3 col-sm-6 text-center px-5">

      <form method="get" action="<?= base_url('productosAdmin') ?>" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Buscar por ID" name="buscar_id">
          <button class="btn btn-outline-success btn-sm" type="submit">Buscar</button>
        </div>
      </form>

    </div>

    <div class="col-md-3 col-sm-6">
      <div class="my-5 d-flex justify-content-end">
          <form method="get" action="<?= base_url('productosAdmin') ?>" enctype="multipart/form-data">
                  <div class="d-flex align-items-center">
                  <select class="form-select mx-2" aria-label="Default select example" name="categoria">
                      <option value="" selected>Seleccione categoría</option>
                      <?php foreach ($categorias as $categoria) : 
                          if($categoria['baja'] != 1 ){ ?>
                            <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
                      <?php } ?>
                          
                      <?php endforeach; ?>
                  </select>
                  <button type="submit" class="btn btn-outline-success btn-sm">Filtrar</button>
              </div>
          </form>
          
      </div>
    </div> 
  </div>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Categoria</th>
          <th scope="col">Nombre</th>
          <th scope="col">descripcion</th>
          <th scope="col">Precio</th>
          <th scope="col">Stock</th>
          <th scope="col">Imagen</th>
          <th scope="col">Acciones</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($productos as $producto):
        
          $cat = $categorias[($producto['id_categoria'] - 1)];
        
        ?>
          <tr >      
              <td><?=$producto['id'];?></td>
              <td><?=$cat['nombre'];?></td>
              <td><?=$producto['nombre'];?></td>
              <td><?=$producto['descripcion'];?></td>
              <td>$<?=$producto['precio'];?></td>
              <td><?=$producto['stock'];?> unidades</td>
              <td>
              <img class="img-thumbnail" 
                src="uploads/<?=$producto['imagen'];?>" 
                alt="thumbnail"
                width=100vw;>
              </td>
              <td> 
                  <a href="<?= base_url('editar/'.$producto['id']);?>" class="btn btn-info" type="button">Editar</a>
              
              <?php if($producto['baja'] == 0){ ?>
                        <a class="btn btn-danger" href="<?=base_url('bajaProducto/' . $producto['id']);?>">Baja</a>
                    <?php }else{?>
                        <a class="btn btn-success" href="<?=base_url('bajaProducto/' . $producto['id']);?>">Alta</a>
                    <?php }  ?>
              </td>
          </tr>
          <?php endforeach;?>
    </tbody>
  </table>
</div>

    




<?=$pie?>