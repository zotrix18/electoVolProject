<?=$cabecera?>

<?php
  $session = session();
  $total = $session->get('total');
  // var_dump($total);
?>
    <div class="container">
        <div class="mb-3">
            <label for="opciones" class="form-label">Elja metodo de pago:</label>
            <select class="form-select" id="opciones">
            <option value="opcion0">Seleccione</option>
            <option value="opcion1">Efectivo/Cheque</option>
            <option value="opcion2">Tarjeta de Credito / Debito</option>
            </select>
        </div>
        
        <div id="divOpcion1" class="opcion-div" style="display: none;">
            <div class="conteiner shadow-lg p-5 m-5 bg-body">
              <form method="post" action="<?=site_url('/confirmarPago')?>" enctype="multipart/form-data">
                <p>Te esperamos en nuestro local de Av. Libertad 5289 de 8hs a 12hs y 17hs a 21hs, acercate con esta factura o con el numero de factura</p>
                <div class="text-center">
                  <button class="btn btn-success" type="submit">Confirmar Pago</button>
                </div>
              </form>
            </div>
        </div>
        
        <div id="divOpcion2" class="opcion-div" style="display: none;">
            <div class="conteiner shadow-lg p-5 m-5 bg-body">
                <form method="post" action="<?=site_url('/confirmarPago')?>" enctype="multipart/form-data">
                    <label for="tarjeta">Numero de tarjeta</label>
                    <input type="number" min="0" maxlength="21" required value="<?=old('tarjeta')?>" class="mt-2 form-control" id="tarjeta" placeholder="Número de tarjeta" name="tarjeta">
                
                    <label for="fecha">Fecha de vencimiento (mm/yy)</label>
                    <input type="text" class="form-control" id="fecha" placeholder="mm/yy" name="fecha">

                    <label for="cvv">CVV</label>
                    <input type="number" min="0" maxlength="21" required value="<?=old('cvv')?>" class="mt-2 form-control" id="cvv" placeholder="Número de cvv" name="cvv">

                    <label for="cuota">Seleccione cuotas:</label>
                    <select class="form-select" id="cuota" name="cuota">
                        <option value="">Seleccione</option>
                        <option value="1">1 Cuota ($<?=$total?>)</option>
                        <option value="3">3 Cuotas de $<?=number_format((($total * 1.21) / 3), 2)?> Interes 21%</option>
                        <option value="6">6 Cuotas de $<?=number_format((($total * 1.5) / 6), 2)?> Interes 50%</option>
                        <option value="12">12 Cuotas de $<?=number_format((($total * 2.1) / 12), 2)?> Interes 110%</option>
                    </select>

                    <label for="nombreTarjeta">Nombre:</label>
                    <input type="text" class="form-control" id="nombreTarjeta" placeholder="Tal como figura en la tarjeta" name="nombreTarjeta">

                    <label for="dni">Identificacion: </label>
                    <input type="text" class="form-control" id="dni" placeholder="DNI/Tarjeta identificatoria/Pasaporte" name="dni">

                    <label for="medio">Seleccione Medio de envio:</label>
                    <select class="form-select" id="medio" name="medio">
                        <option value="">Seleccione</option>
                        <option value="opcion11">Andreani</option>
                        <option value="opcion12">OCA</option>
                        <option value="opcion13">Retiro Presencial</option>
                    </select>

                    <div id="divOpcion11" class="opcion-div" style="display: none;">
                        <div>
                            <p>Costo de envio: $5000</p>
                            <label for="direccion">Direccion:</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Direccion de envio" name="direccion">
                        </div>
                    </div>

                    <div id="divOpcion12" class="opcion-div" style="display: none;">
                        <div>
                            <p>Costo de envio: $6000</p>
                            <label for="direccion2">Direccion:</label>
                            <input type="text" class="form-control" id="direccion2" placeholder="Direccion de envio" name="direccion2">
                        </div>
                    </div>

                    <div id="divOpcion13" class="opcion-div" style="display: none;">
                        <div>
                            <p>Te esperamos en nuestro local de Av. Libertad 5289 de 8hs a 12hs y 17hs a 21hs</p>
                        </div>
                    </div>


                    <div class="text-center mt-5">
                  <button class="btn btn-success" type="submit">Confirmar Pago</button>
                </div>
                </form>
            </div>
        </div>
        
      </div>

<script>
    var selectElement = document.getElementById('opciones');

    var divOpcion1 = document.getElementById('divOpcion1');
    var divOpcion2 = document.getElementById('divOpcion2');
    

    var tarjetaElement = document.getElementById('tarjeta');

    var fechaElement = document.getElementById('fecha');

    var cvvElement = document.getElementById('cvv');

    var medioElement = document.getElementById('medio');
    var divOpcion11 = document.getElementById('divOpcion11');
    var divOpcion12 = document.getElementById('divOpcion12');
    var divOpcion13 = document.getElementById('divOpcion13');




    selectElement.addEventListener('change', function() {
        divOpcion1.style.display = 'none';
        divOpcion2.style.display = 'none';
        

        if (this.value === 'opcion1') {
            divOpcion1.style.display = 'block';
        } else if (this.value === 'opcion2') {
            divOpcion2.style.display = 'block';
        } 
    });

    tarjetaElement.addEventListener('input', function() {
    var valor = this.value;

    // Limitar la longitud a 21 caracteres
    if (valor.length > 21) {
      this.value = valor.slice(0, 21);
    }
  });

  cvvElement.addEventListener('input', function() {
    var valor = this.value;

    // Limitar la longitud a 3 caracteres
    if (valor.length > 3) {
      this.value = valor.slice(0, 3);
    }
  });

    fechaElement.addEventListener('input', function() {
    var valor = this.value;

    // Eliminar todos los caracteres que no sean números
    var numeros = valor.replace(/\D/g, '');

    // Insertar automáticamente el separador después de los dos primeros dígitos
    if (numeros.length > 2) {
      numeros = numeros.slice(0, 2) + '/' + numeros.slice(2);
    }

    // Limitar la longitud a 7 caracteres (incluyendo el separador "/")
    if (numeros.length > 5) {
      numeros = numeros.slice(0, 5);
    }

    this.value = numeros;
  });

  medioElement.addEventListener('change', function() {
    var opcionSeleccionada = this.value;

    // Ocultar todos los div de opciones
    divOpcion11.style.display = 'none';
    divOpcion12.style.display = 'none';
    divOpcion13.style.display = 'none';

    // Mostrar el div correspondiente a la opción seleccionada
    if (opcionSeleccionada === 'opcion11') {
      divOpcion11.style.display = 'block';
    } else if (opcionSeleccionada === 'opcion12') {
      divOpcion12.style.display = 'block';
    } else if (opcionSeleccionada === 'opcion13') {
      divOpcion13.style.display = 'block';
    }
  });

</script>

<?=$pie?>