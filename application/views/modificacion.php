<form class="" method="post" action="<?=base_url().'documento/modificar'?>">
  <div class="row my-1" style="">
    <div class="col-md-12"></div>
  </div>
  
  <h1><?=$old['oblea'];?></h1>

  <hr>
  
  <div class="form-group">
    <label for="unidad_organica"><b>Unidad Org�nica</b></label>
    <input id="unidad_organica" name="unidad_organica" type="text" aria-describedby="unidad_organica" readonly class="form-control here" value="<?=utf8_decode($old['unidad_organica']);?>">
    <span id="unidad_organica" class="form-text text-muted">Unidad Org�nica emisora</span>
  </div>

  <div class="form-group">
    <label for="uas"><b>UAS</b></label>
    <input id="uas" name="uas" type="text" aria-describedby="uas" readonly class="form-control here" value="<?=utf8_decode($old['uas']);?>">
    <span id="uas" class="form-text text-muted">C�digo de Matriz UAS</span>
  </div>

  <div class="form-group">
    <label for="titulo"><b>T�tulo</b></label>
    <input id="titulo" name="titulo" placeholder="T�tulo" type="text" aria-describedby="titulo" required class="form-control here" value="<?=utf8_decode($old['titulo']);?>">
    <span id="titulo" class="form-text text-muted">T�tulo del documento</span>
  </div>

  
  <div class="form-group">
    <label for="os"><b>OS</b></label>
    <input id="os" name="os" placeholder="OS" type="text" aria-describedby="kks" class="form-control here" value="<?=$old['os'];?>">
    <span id="os" class="form-text text-muted">OS (sin espacios ni s�mbolos)</span>
  </div>


  <div class="form-group">
    <label for="kks"><b>KKS</b></label>
    <input id="kks" name="kks" placeholder="KKS" type="text" aria-describedby="kks" class="form-control here" value="<?=$old['kks'];?>">
    <span id="kks" class="form-text text-muted">KKS(s) (sin espacios ni s�mbolos, separados por comas ",")</span>
  </div>

  <div class="form-group">
    <label for="fecha_vigencia"><b>Fecha de Vigencia</b></label>
    <input id="fecha_vigencia" name="fecha_vigencia" placeholder="Ingrese Fecha" type="date" aria-describedby="text" required class="form-control here" value="<?=$old['fecha_vigencia'];?>">
    <span id="text" class="form-text text-muted">Fecha de Liberaci�n del Documento</span>
  </div>

  <div class="form-group">
    <label for="fecha_numero"><b>N�mero</b></label>
    <input id="fecha_numero" name="fecha_numero" placeholder="Fecha o n�mero" type="text" aria-describedby="text" class="form-control here" value="<?=$old['fecha_numero'];?>">
    <span id="text" class="form-text text-muted">Fecha o n�mero (FENRO) del documento</span>
  </div>

  <div class="form-group">
    <label for="revision"><b>Revisi�n</b></label>
    <input id="revision" name="revision" placeholder="Revisi�n" maxlength="3" type="text" aria-describedby="revision" required class="form-control here" value="<?=$old['revision'];?>">
    <span id="revision" class="form-text text-muted">Revisi�n del documento</span>
  </div>

  <div class="form-group">
    <label for="numero_enace"><b>N�mero KWU/Enace/NASA</b></label>
    <input id="numero_enace" name="numero_enace" placeholder="N�mero por KWU, Enace o NASA" type="text" aria-describedby="numero_enace" class="form-control here" value="<?=$old['numero_enace'];?>">
    <span id="numero_enace" class="form-text text-muted">Opcional (Ej.: 002-TM3-00-40519, IT-051, HDOC-A-FCL-04)</span>
  </div>

  <div class="form-group">
    <label for="documento_original"><b>N�mero Documento Original</b></label>
    <input id="documento_original" name="documento_original" placeholder="N�mero de Documento Original" type="text" aria-describedby="documento_original" class="form-control here" value="<?=$old['documento_original'];?>">
    <span id="documento_original" class="form-text text-muted">Opcional</span>
  </div>

  <div class="form-group">
    <label for="numero_proveedor"><b>N�mero Proveedor</b></label>
    <input id="numero_proveedor" name="numero_proveedor" placeholder="N�mero de Proveedor" type="text" class="form-control here" aria-describedby="numero_proveedor" value="<?=$old['numero_proveedor'];?>">
    <span id="numero_proveedor" class="form-text text-muted">Opcional</span>
  </div>

  <input type="hidden" name="cud" value="<?=$old['cud'];?>">

  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Modificar</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  </div>



</form>