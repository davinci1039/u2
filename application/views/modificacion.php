<form class="" method="post" action="<?=base_url().'documento/modificar'?>">
  <div class="row my-1" style="">
    <div class="col-md-12"></div>
  </div>
  
  <h1><?=$old['oblea'];?></h1>

  <hr>
  
  <div class="form-group">
    <label for="unidad_organica"><b>Unidad Orgánica</b></label>
    <input id="unidad_organica" name="unidad_organica" type="text" aria-describedby="unidad_organica" readonly class="form-control here" value="<?=utf8_decode($old['unidad_organica']);?>">
    <span id="unidad_organica" class="form-text text-muted">Unidad Orgánica emisora</span>
  </div>

  <div class="form-group">
    <label for="uas"><b>UAS</b></label>
    <input id="uas" name="uas" type="text" aria-describedby="uas" readonly class="form-control here" value="<?=utf8_decode($old['uas']);?>">
    <span id="uas" class="form-text text-muted">Código de Matriz UAS</span>
  </div>

  <div class="form-group">
    <label for="titulo"><b>Título</b></label>
    <input id="titulo" name="titulo" placeholder="Título" type="text" aria-describedby="titulo" required class="form-control here" value="<?=utf8_decode($old['titulo']);?>">
    <span id="titulo" class="form-text text-muted">Título del documento</span>
  </div>

  
  <div class="form-group">
    <label for="os"><b>OS</b></label>
    <input id="os" name="os" placeholder="OS" type="text" aria-describedby="kks" class="form-control here" value="<?=$old['os'];?>">
    <span id="os" class="form-text text-muted">OS (sin espacios ni símbolos)</span>
  </div>


  <div class="form-group">
    <label for="kks"><b>KKS</b></label>
    <input id="kks" name="kks" placeholder="KKS" type="text" aria-describedby="kks" class="form-control here" value="<?=$old['kks'];?>">
    <span id="kks" class="form-text text-muted">KKS(s) (sin espacios ni símbolos, separados por comas ",")</span>
  </div>

  <div class="form-group">
    <label for="fecha_vigencia"><b>Fecha de Vigencia</b></label>
    <input id="fecha_vigencia" name="fecha_vigencia" placeholder="Ingrese Fecha" type="date" aria-describedby="text" required class="form-control here" value="<?=$old['fecha_vigencia'];?>">
    <span id="text" class="form-text text-muted">Fecha de Liberación del Documento</span>
  </div>

  <div class="form-group">
    <label for="fecha_numero"><b>Número</b></label>
    <input id="fecha_numero" name="fecha_numero" placeholder="Fecha o número" type="text" aria-describedby="text" class="form-control here" value="<?=$old['fecha_numero'];?>">
    <span id="text" class="form-text text-muted">Fecha o número (FENRO) del documento</span>
  </div>

  <div class="form-group">
    <label for="revision"><b>Revisión</b></label>
    <input id="revision" name="revision" placeholder="Revisión" maxlength="3" type="text" aria-describedby="revision" required class="form-control here" value="<?=$old['revision'];?>">
    <span id="revision" class="form-text text-muted">Revisión del documento</span>
  </div>

  <div class="form-group">
    <label for="numero_enace"><b>Número KWU/Enace/NASA</b></label>
    <input id="numero_enace" name="numero_enace" placeholder="Número por KWU, Enace o NASA" type="text" aria-describedby="numero_enace" class="form-control here" value="<?=$old['numero_enace'];?>">
    <span id="numero_enace" class="form-text text-muted">Opcional (Ej.: 002-TM3-00-40519, IT-051, HDOC-A-FCL-04)</span>
  </div>

  <div class="form-group">
    <label for="documento_original"><b>Número Documento Original</b></label>
    <input id="documento_original" name="documento_original" placeholder="Número de Documento Original" type="text" aria-describedby="documento_original" class="form-control here" value="<?=$old['documento_original'];?>">
    <span id="documento_original" class="form-text text-muted">Opcional</span>
  </div>

  <div class="form-group">
    <label for="numero_proveedor"><b>Número Proveedor</b></label>
    <input id="numero_proveedor" name="numero_proveedor" placeholder="Número de Proveedor" type="text" class="form-control here" aria-describedby="numero_proveedor" value="<?=$old['numero_proveedor'];?>">
    <span id="numero_proveedor" class="form-text text-muted">Opcional</span>
  </div>

  <input type="hidden" name="cud" value="<?=$old['cud'];?>">

  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Modificar</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  </div>



</form>