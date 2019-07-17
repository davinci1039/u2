<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo">
Agregar nuevo documento
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar">
Modificar Documento
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#destacado">
Asignar KKS destacados
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#referencia">
Agregar referencia
</button>
<!-- Modal -->
<?php
    modal_grande('nuevo',$titulo_nuevo,$contenido_nuevo);
    modal_grande('destacado',$titulo_destacado,$contenido_destacado);
    modal_grande('referencia',$titulo_referencia,$contenido_referencia);
    modal_grande('modificar',$titulo_modificar,$contenido_modificar);
?>
