<form>
	<div class="row my-1" style="">
		<div class="col-md-12"></div>
	</div>
	<div class="form-group">
		<label for="documento_referencia"><b>Asignar Referencia al Documento</b></label>
		<input id="documento_referencia" required name="documento_referencia" placeholder="CUD de referencia" type="text" class="form-control here" aria-describedby="numero_proveedor">
		<span id="numero_proveedor" class="form-text text-muted">Por ej.: U2-TP-BN-000021,U2-IN-BG-000432,etc. -sin espacios-</span>
	</div>
	
	<div class="form-group">
		<button name="submit" type="submit" class="btn btn-primary">Guardar</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	</div>
</form>