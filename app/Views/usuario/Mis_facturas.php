<?=$cabecera?>
<?php
    $i=1;
    


?>

<div class="shadow p-3 my-5 mx-5 bg-body rounded conteiner text-center">
  
  <table class="table table-bordered">
    <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Total</th>
          <th scope="col">Metodo de Pago</th>
          <th scope="col">Numero de Tarjeta</th>
          <th scope="col">Cuotas</th>
          <th scope="col">Envio</th>
          <th scope="col">Direccion</th>
          <th scope="col">Fecha</th>
          <th scope="col">Detalle</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($facturas as $factura): 
        $total = number_format($factura['total'], 2, ',', '.');
        if($factura['metodo_pago'] == 1){
            $metodo = 'Efectivo / Cheque';
            $tarjeta = 'No Corresponde';
        }else{
            $metodo = 'Tarjeta Credito / Debito';
            $tarjeta = '••••' . (substr($factura['numero_tarjeta'], -4)); 
        }
        
        $fecha =  date("d-m-Y", strtotime($factura['fecha_alta']));
        
        ?>
          <tr >
              <td><?=$i;?></td>
              <td>$<?=$total;?></td>
              <td><?=$metodo;?></td>
              <td><?=$tarjeta?></td>
              <td><?=$factura['cuotas'];?></td>
              <td><?=$factura['envio'];?></td>
              <td><?=$factura['direccion'];?></td>
              <td><?=$fecha;?></td>
              <td> 
                  <a href="<?= base_url('comprobante/' . $factura['id']);?>" class="btn btn-info" type="button">Ver detalle</a>
                </td>
          </tr>
          
          <?php 
        $i=$i + 1;
        endforeach;?>
    </tbody>
  </table>
</div>

<?=$pie?>