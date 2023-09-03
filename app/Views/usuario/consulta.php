<?=$cabecera?>

<div class="conteiner sep shadow-lg p-3 mb-5 bg-body-tertiary rounded border border-dark-subtle">
    <h4 clasS="fs-4">Dejanos un mensaje</h4>
          <form action="<?=site_url('/mensajeConsulta')?>" enctype="multipart/form-data" method="post" >
                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input type="text" required id="asunto" name="asunto" value="<?=old('asunto')?>" class="form-control border border-secondary"   placeholder="Minimo 5 letras">
                </div>
                <br>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea required id="Descripcion"  name="descripcion" value="<?=old('descripcion')?>" class="form-control border border-secondary" rows="5"  placeholder="Describa brevemente su consulta"></textarea>
                </div>
                <br>  
                <div class="form-check">
                    <input type="checkbox"  required class="form-check-input border border-secondary" id="leido">
                    <label class="form-check-label" for="leido">He leido los <a href="http://localhost/proyecto_quintana/public/tyc">términos y condiciones de la página</a> </label>
                </div>
                <div class="separar text-center pt-5">
                    <button type="submit button" class="btn btn-primary" ><span class="submit-boton button btn btn-primary">Enviar</span></button>
                </div>
            </form>
</div>

<?=$pie?>