<?=$cabecera?>
<?php 
    $session=session();
    

    //verifica que si el usuario ya ha iniciado sesion no acceda a esta parte
    if($session ->has ('usuario')){
      $log = $session->get('usuario');
      
      //si es admin, no puede acceder al panel principal, solo al panel admin
      if($log['perfil_id'] == 2){
        header("Location: " . base_url('inicio'));
        exit();
      }
    }
    
    ?>

   
<div class="container shadow p-3 my-5 bg-body rounded">
<h2 class="fs-1 text text-center fw-bold">Catálogo</h2>
    
<div class="row">

  <div class="col-md-3 "></div>
  <div class="col-md-3 "></div>
  <div class="col-md-3 col-sm-6">
    <form method="get" id="ordenarForm" action="<?= base_url('catalogo') ?>" enctype="multipart/form-data">
        <div class="text-center">
            <label for="categoria">Ordernar por:</label>
            </div>
            <div class="d-flex align-items-center">
            <select class="form-select mx-2" id="ordenSelect" aria-label="Default select example" name="orden">
            <option value="">Relevante</option>
            <option value="1">Menor precio</option>
            <option value="2">Mayor precio</option>                   
            </select>
            <button type="submit" class="btn btn-outline-success btn-sm">Filtrar</button>
        </div>
    </form>
  </div>

  <div class="col-md-3 col-sm-6">
      <form method="get" action="<?= base_url('catalogo') ?>" enctype="multipart/form-data">
          <div class="text-center">
              <label for="categoria">Filtrar por Categoría:</label>
              </div>
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


  <?php $contador = 0; ?>
  <?php foreach ($productos as $producto) : 
    $estadoCat = $categorias[($producto['id_categoria'] - 1)];
    if(!($producto['baja'] != 0 || $estadoCat['baja'] != 0)){
     if ($contador % 4 == 0) { ?>
      <div class="row">
    <?php } ?>
    
    
    
    <div class="col-md-3 col-sm-6 text-center my-3">
      <div class="card ">
        <div class="text-center mb-3">
            <img  
                src="uploads/<?=$producto['imagen'];?>" 
                alt="thumbnail"
                width=200vw;>
        </div>
        <div class="card-body mb-3">
            <h5 class="card-title"><?=$producto['nombre']?></h5>
            <p class="card-text">$<?=$producto['precio']?></p>
            <p class="card-text"><?=$producto['descripcion']?></p>
            
            <?php 
            if($session->has('usuario')){
              if($producto['stock'] == 0){ ?>
                <button class="btn btn-danger" type="button">SIN STOCK</button>
              <?php 
              } else { 
              ?>
              
                <a href="<?= base_url('agregarCarrito/'.$producto['id']);?>" class="btn btn-success" type="button">Agregar al Carrito</a>
              
                <?php
              }
              ?>
                

            <?php }?>
        </div>
        
      </div>
    </div>
    
    <?php $contador++; ?>
    <?php if ($contador % 4 == 0) { ?>
      </div>
    <?php } } ?>
    
<?php endforeach;?>
  
  <?php if ($contador % 4 != 0) { ?>
    </div>
  <?php } ?>
</div>
<!-- 14:06 -->

<?=$pie?> 