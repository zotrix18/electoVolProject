<?=$cabecera?>
<div class="pt-5 text-center conteiner">
  <h2>Mensajes sin leer</h2>
  <div class="shadow-lg p-3 mb-5 bg-body rounded conteiner text-center mx-5 my-5">
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <?php foreach ($contactos as $indice => $contacto) {
        $nombre = $contacto['nombre'];
        $correo = $contacto['email'];
        $asunto = $contacto['asunto'];
        $mensajeText = $contacto['descripcion'];
        $leido = $contacto['leido'];
        if ($leido == 0) {
          $acordeonId = 'acordeon-' . $indice;
      ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $acordeonId; ?>">
              <button class="accordion-button collapsed" 
              type="button" 
              data-bs-toggle="collapse" 
              data-bs-target="#collapse<?php echo $acordeonId; ?>" 
              aria-expanded="false" 
              aria-controls="collapse<?php echo $acordeonId; ?>">
                Asunto: <?php echo $asunto; ?>
              </button>
            </h2>
            <div id="collapse<?php echo $acordeonId; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $acordeonId; ?>" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
              
                <p>Nombre: <?=$nombre?>
                <p>Correo: <?=$correo?></p>
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <p><?=$mensajeText ?></p>
                </div>
              
              </div>
              <a class="btn btn-info" href="<?=base_url('contactoLeido/'.$contacto['id']);?>">Leido</a>
            </div>
          </div>
      <?php }
      } ?>
    </div>
  </div>
</div>

<div class="pt-5 text-center conteiner">
  <h2>Mensajes leidos</h2>
  <div class="shadow-lg p-3 mb-5 bg-body rounded conteiner text-center mx-5 my-5">
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <?php foreach ($contactos as $indice => $contacto) {
        $nombre = $contacto['nombre'];
        $correo = $contacto['email'];
        $asunto = $contacto['asunto'];
        $mensajeText = $contacto['descripcion'];
        $leido = $contacto['leido'];
        if ($leido == 1) {
          $acordeonId = 'acordeon-' . $indice;
      ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $acordeonId; ?>">
              <button class="accordion-button collapsed" 
              type="button" 
              data-bs-toggle="collapse" 
              data-bs-target="#collapse<?php echo $acordeonId; ?>" 
              aria-expanded="false" 
              aria-controls="collapse<?php echo $acordeonId; ?>">
                Asunto: <?php echo $asunto; ?>
              </button>
            </h2>
            <div id="collapse<?php echo $acordeonId; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $acordeonId; ?>" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
               <p>Nombre: <?=$nombre?>
               <p>Correo: <?=$correo?></p>
               <div class="shadow p-3 mb-5 bg-body rounded">
                  <p><?=$mensajeText ?></p>
               </div>
              </div>
            </div>
          </div>
      <?php }
      } ?>
    </div>
  </div>
</div>
 


<?=$pie?>