</body>
<footer>
<div class="container-fluid" id="contacto">
      <div class="row">
        <div class="col-sm-12 col-md-6 redes">
          <h4>Redes Sociales</h4>
          <a class="anchorSeparador" href="http://www.facebook.com">Facebook <img src="<?=base_url()?>/assets/svg/facebook.svg" alt="faceLogo"></img></a>
          
          <a class="anchorSeparador" href="http://www.instagram.com">Instagram <img src="<?=base_url()?>/assets/svg/instagram.svg" alt="faceLogo"></img></a>
          
          <a class="anchorSeparador" href="http://www.whatsapp.com">Whatsapp <img src="<?=base_url()?>/assets/svg/whatsapp.svg" alt="faceLogo"></img></a>
        </div>
        <div class="col-sm-12 col-md-6 sitios">
          <h4>Sitios de importancia</h4>
          <a class="anchorSeparador-2" href="<?=site_url('')?>">Principal</a>
          <a class="anchorSeparador-2" href="<?=site_url('nosotros')?>">Quienes Somos</a>
          <a class="anchorSeparador-2" href="<?=site_url('catalogo')?>">Catalogo de Productos</a>
          <?php
            $session=session();
            //si esta logeado
            if($session->has('usuario')){ ?>
                <a class="anchorSeparador-2" href="<?=site_url('consulta')?>">Consultas</a>
            <?php }else{ ?>
                <a class="anchorSeparador-2" href="<?=site_url('contacto')?>">Contacto</a>
            <?php } ?>
          
          <a class="anchorSeparador-2" href="<?=site_url('comercializacion')?>">Comercializacion</a>
          <a class="anchorSeparador-2" href="<?=site_url('tyc')?>">Terminos y Condiciones</a>
        </div>
      </div>
  </div>
</footer>
</html>