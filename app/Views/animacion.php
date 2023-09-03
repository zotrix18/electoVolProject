<?=$cabecera?>
<?php
$session = session();
$idComp = $session->get('idComprobante');
?>
<br><br><br><br><br><br><br><br>
<div class="conteiner text-center">
    <div class="spinner-grow saltito text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow saltito text-secondary" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow saltito text-success" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow saltito text-danger" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow saltito text-warning" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow saltito text-info" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow saltito text-dark" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>
</div>
<br><br><br><br><br><br><br><br>

<script>
    setTimeout(function() {
        var idComprobante = <?=$idComp?>;
        var url = 'https://electrovoltaicss.000webhostapp.com/comprobante/' + idComprobante;
        window.location.href = url;
    }, 3000);
</script>
