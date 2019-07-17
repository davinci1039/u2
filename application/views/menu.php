<div class="menulateral">
	<div class="row">
		<div class="span5">
			<div id="menu" class="menu">
				<div class="accordion">
					<!-- Áreas -->
					<div class="accordion-group">
						<!-- Área -->
						<?php
						$CI =& get_instance();
						$conexion = $CI->load->database('doccnaii');
						cargarMenu($conexion,'0',0);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script>
	menuPlusMinus();
</script>