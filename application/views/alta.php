<form class="" method="post" action="<?=base_url().'documento/alta'?>">
  <div class="row my-1" style="">
    <div class="col-md-12"></div>
  </div>
  
  <div class="form-group">
    <label for="unidad_organica"><b>Unidad orgánica</b></label>
    <div>
      <select id="unidad_organica" name="unidad_organica" aria-describedby="unidad_organica" required class="custom-select">
        <option selected> Seleccione unidad orgánica... </option>
        <?php 
        foreach ($uo as $uo) 
        {echo "<option value='".$uo['uo']."'>".$uo['uo']." - ".utf8_decode($uo['descripcion'])."</option>";}
        ?>
      </select>
      <span id="unidad_organica" class="form-text text-muted">Unidad Orgánica emisora</span>
    </div>
  </div>

  <div class="form-group">
    <label for="emisor"><b>Emisor</b></label>
    <div>
      <select id="emisor" name="emisor" aria-describedby="emisor" class="custom-select">
        <option selected> Seleccione emisor... </option>
        <?php 
        foreach ($emisor as $emisor) 
        {echo "<option value='".$emisor['sector']."'>".$emisor['sector']." - ".utf8_decode($emisor['descripcion'])."</option>";}
        ?>
      </select>
      <span id="emisor" class="form-text text-muted">Emisor del documento</span>
    </div>
  </div>

  <div class="form-group">
    <label for="uas"><b>UAS</b></label>
    <div>
      <select id="uas" name="uas" aria-describedby="uas" required class="custom-select">
        <option selected> Seleccione UAS... </option>
        <?php 
        foreach ($uas as $uas) 
        {echo "<option value='".$uas['id']."'>".$uas['id']." - ".utf8_decode($uas['descripcion'])."</option>";}
        ?>
      </select>
      <span id="uas" class="form-text text-muted">UAS del documento</span>
    </div>
  </div>

  <div class="form-group">
    <label for="titulo"><b>Título</b></label>
    <input id="titulo" name="titulo" placeholder="Título" type="text" aria-describedby="titulo" required class="form-control here">
    <span id="titulo" class="form-text text-muted">Título del documento</span>
  </div>

  <div class="form-group">
    <label for="os"><b>OS</b></label>
    <input id="os" name="os" placeholder="OS" type="text" aria-describedby="kks" class="form-control here">
    <span id="os" class="form-text text-muted">OS (sin espacios ni símbolos, separados por comas ",")</span>
  </div>


  <div class="form-group">
    <label for="kks"><b>KKS</b></label>
    <input id="kks" name="kks" placeholder="KKS" type="text" aria-describedby="kks" class="form-control here">
    <span id="kks" class="form-text text-muted">KKS(s) (sin espacios ni símbolos, separados por comas ",")</span>
  </div>

  <div class="form-group">
    <label for="fecha_vigencia"><b>Fecha de Vigencia</b></label>
    <input id="fecha_vigencia" name="fecha_vigencia" placeholder="Ingrese Fecha" type="date" aria-describedby="text" required class="form-control here" value="<?=date('Y-m-d');?>">
    <span id="text" class="form-text text-muted">Fecha de Liberación del Documento</span>
  </div>

  <div class="form-group">
    <label for="fecha_numero"><b>Número</b></label>
    <input id="fecha_numero" name="fecha_numero" placeholder="Fecha o número" type="text" aria-describedby="text" class="form-control here">
    <span id="text" class="form-text text-muted">Fecha o número (FENRO) del documento</span>
  </div>

  <div class="form-group">
    <label for="revision"><b>Revisión</b></label>
    <input id="revision" name="revision" placeholder="Revisión" type="text" aria-describedby="revision" required value="0" maxlength="3" class="form-control here">
    <span id="revision" class="form-text text-muted">Revisión del documento</span>
  </div>

  <div class="form-group">
    <label for="numero_enace"><b>Número KWU/Enace/NASA</b></label>
    <input id="numero_enace" name="numero_enace" placeholder="Número por KWU, Enace o NASA" type="text" aria-describedby="numero_enace" class="form-control here">
    <span id="numero_enace" class="form-text text-muted">Opcional (Ej.: 002-TM3-00-40519, IT-051, HDOC-A-FCL-04)</span>
  </div>

  <div class="form-group">
    <label for="documento_original"><b>Número Documento Original</b></label>
    <input id="documento_original" name="documento_original" placeholder="Número de Documento Original" type="text" aria-describedby="documento_original" class="form-control here">
    <span id="documento_original" class="form-text text-muted">Opcional</span>
  </div>

  <div class="form-group">
    <label for="numero_proveedor"><b>Número Proveedor</b></label>
    <input id="numero_proveedor" name="numero_proveedor" placeholder="Número de Proveedor" type="text" class="form-control here" aria-describedby="numero_proveedor">
    <span id="numero_proveedor" class="form-text text-muted">Opcional</span>
  </div>

  <div class="form-group">
    <button name="submit" name="alta" type="submit" class="btn btn-primary">Guardar Alta</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  </div>



</form>