<?=$cabecera?>
<?php
    $session=session();
    $logSession = $session->get('usuario');
    
    // $datos_compra= $datos['datos_compra'];
    // $detalle_compra= $datos['detalle_compra'];
    $date = date('d-m-y');
    $carrito2 = $session->get('carro');
    $total = $datos_compra['total'];
    $total = number_format($total, 2, ',', '.');
    

    
    if($datos_compra['metodo_pago'] == 1){
        $metodo='Efectivo/Cheque';
        $tarjeta=NULL;
    }else{ 
        $metodo = 'Credito/Debito  -' . 'Cuotas: ' . $datos_compra['cuotas'];
        $tarjeta = '••••' . (substr($datos_compra['numero_tarjeta'], -4));
        }

    if($datos_compra['envio'] == 'oca'){
        $envio ='OCA ' . $datos_compra['direccion'];
    }elseif($datos_compra['envio'] == 'andreani'){ 
        $envio ='Andreani ' . $datos_compra['direccion'];
    }else{
        $envio ='Retiro en sucursal Electro Voltaics';
    }

    $fecha =  date("d-m-y", strtotime($datos_compra['fecha_alta']));
?>
<div  class="sep conteiner shadow-lg p-5 bg-body rounded">
    <div class="text-center">
        <p class="h2 text-center">FACTURA X</p>
        <p class="h5 text-center">Fecha: <?=$fecha?></p>
    </div>

    <div class="conteiner my-5">
        <div class="row">
            <div class="col-lg-12 col-xl-3 col-md-12 border border-dark mx-3 my-4">
                <p>Electro Voltaics S.A.</p>
                <p>Av. Libertad 5289</p>
                <p>IVA Regimen Comun</p>
                <p>No somos retenedores de IVA</p>
                <p>Inicio de actividades: 28/05/2012</p>
            </div>
            
            <div class="col-lg-12 col-xl-4 col-md-12 border border-dark stacked-box mWidth">
               <p class="text-light bg-dark">FACTURA NUMERO:</p> 
               <p>000000000342-<?=$id_compra?></p>
            </div>
        </div>
    </div>


    <div class="conteiner">
        <div class="row">
            <div class="col-lg-4 col-sm-11 ms-4 border border-dark mx-3 my-4">
                <p>Detalle cliente:</p>
                <p>Nombre: <?=$logSession['nombre']?></p>  
                <p>Apellido: <?=$logSession['apellido']?></p>
            </div>
            <div class="col-lg-1 col-sm-1"></div>
            <div class="col-lg-5 col-sm-11 mx-3 my-4 border border-dark">
                <p>Fecha: <?=$fecha?></p>
                <p>Forma de pago: <?=$metodo?></p>
                <?php
                if($tarjeta != NULL) { ?>
                    <p>Tarjeta: <?=$tarjeta?></p>
                <?php
                }
                ?>
                <p>Forma de envio: <?=$envio?></p>
            </div>
        </div>
    </div>
        
    <div class="border border-dark">

        <table class="table border table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Importe unitario</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    for ($i = 0; $i <= count($detalle_compra); $i++) {
                        if(isset($detalle_compra[$i])){
                            $datoCarro = $detalle_compra[$i];
                            ?>
                            <tr>
                                <td>#<?=($i+1) ?></td>
                                <td><?=$datoCarro['nombre'] ?></td>
                                <td>  
                                    <div class=" col-2 shadow-sm ml-5 p-2 mb-5 bg-body rounded border border-2">
                                        <?=$datoCarro['cantidad']?>
                                    </div>
                                </td>
                                <td>$<?= $datoCarro['importe_unitario'] ?></td>
                                <td>$<?= $datoCarro['importe'] ?></td>
                            </tr>
                        <?php
                            } 
                        } 
                ?>

            </tbody>
            </table>
            <div class="conteiner">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        <p class="fs-4  text-center ">TOTAL: $<?=$total?> </p>        
                    </div>
                    
        
                </div>
            </div>
        </div>
        <br>
   <p class="text-muted">Gracias por su compra. Para cualquier consulta o asistencia adicional, no dude en ponerse en contacto con nuestro equipo de atención al cliente.</p>

   <div class="text-muted">
    <p> Teléfono: +543795334455</p>
    <p>Email: electro@voltaics.com</p>
    <p>Sitio web: ElectroVoltaics.com</p>
    </div>

    <p class="text-muted">Términos y condiciones:</p>
    
    <ul class="text-muted">
        <li>Todos los pagos deben realizarse en un plazo de 30 días a partir de la fecha de emisión de la factura.</li>
        <li>No se aceptan devoluciones después de 14 días a partir de la fecha de compra.</li>
        <li>Los productos deben ser devueltos en su estado original y sin usar para ser elegibles para un reembolso.</li>
    </ul>
    <p class="text-muted">Gracias nuevamente por elegir nuestros servicios.</p>
    
    
    
    <br>
    <br>
    <br>
</div>
    



<?=$pie?>