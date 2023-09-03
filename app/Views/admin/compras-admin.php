<?=$cabecera?>
<?php
//espacio para pruebas

// var_dump($prueba);
// var_dump($datos_compras);

?>

<div class="shadow p-3 my-5 mx-5 bg-body rounded conteiner text-center">
  <div class="conteiner text-center my-5">
  <form method="get" action="<?= base_url('facturas') ?>">
    <label for="fecha">Filtrar por fecha:</label>
    <div>Desde
    <input type="date" id="fecha" name="fecha" >
    Hasta
    <input type="date" id="fecha2" name="fecha2" >
    <input type="submit" value="Filtrar">
    </div>
    
  </form>
  </div>
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Total</th>
          <th scope="col">Usuario</th>
          <th scope="col">Metodo de Pago</th>
          <th scope="col">Cuotas</th>
          <th scope="col">Envio</th>
          <th scope="col">Direccion</th>
          <th scope="col">Fecha</th>
          <th scope="col">Detalle</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      
    //   var_dump($datos_compras);
    // if(datos_compras)  
    
    foreach($datos_compras as $cabeceraFactura): 
        $total = number_format($cabeceraFactura['total'], 2, ',', '.');
        if($cabeceraFactura['metodo_pago'] == 1){
            $metodo = 'Efectivo / Cheque';
            
        }else{
            $metodo = 'Tarjeta Credito / Debito';
           
        }
        
        $fecha =  date("d-m-Y", strtotime($cabeceraFactura['fecha_alta']));
        
        ?>
          <tr >
              <td><?=$cabeceraFactura['id'];?></td>
              <td>$<?=$total;?></td>
              
              <?php 
                for($i=0; $i<count($usuarios); $i++){
                  $dato = $usuarios[$i];
                  if($dato['id'] == $cabeceraFactura['id_usuario']){ ?>
                    
                    <td><?=$dato['usuario']?></td>

                   <?php
                      }
                    } 
                ?>

              
              <td><?=$metodo;?></td>
              <td><?=$cabeceraFactura['cuotas'];?></td>
              <td><?=$cabeceraFactura['envio'];?></td>
              <td><?=$cabeceraFactura['direccion'];?></td>
              <td><?=$fecha;?></td>
              <td> 
                  <a href="<?= base_url('comprobante/' . $cabeceraFactura['id']);?>" class="btn btn-info" type="button">Ver detalle</a>
                </td>
          </tr>
          
          <?php 
        endforeach;?>
        </tbody>
    </table>

</div>

<?=$pie?>