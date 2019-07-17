<?php 
function definedestino($intra)
	{
		if ($intra==1) {
		$destino='frame';
		}
		else{
		$destino='_blank';
		}
		return($destino);
	}
	

	//mover a libreria
	function cargarMenu($conexion, $id, $nivel)
	{
		switch ($nivel)
		{
			case '0':
				$clase='area';
			break;
			case '1':
				$clasep='equipamento';
			break;
			case '2':
				$clase= 'ponto';
			break;
		}
		
		
		$conexion = mysqli_connect("localhost", "root", "", "u2");
		//mover a libreria
		$sql="SELECT sitio_menu.id,sitio_menu.titulo,sitio_menu.enlace,sitio_menu.intra FROM sitio_menu WHERE sitio_menu.IDparent='".$id."' ORDER BY sitio_menu.pos";
		${"resultado".$nivel} = mysqli_query($conexion, $sql);
		if ($contenido[$nivel] = mysqli_fetch_array(${"resultado".$nivel})) 
		{
			do 
			{
				?>
					<div class="accordion-heading <?php echo @$clase;?>" >
					<?php
					if ($contenido[$nivel]['enlace']!='')
						{
						$destino=definedestino($contenido[$nivel]['intra']);
						?>
						<!-- Links -->
						
						<a class="accordion-toggle menu-lil-font" href="<?php echo $contenido[$nivel]['enlace'];?>" target="<?php echo $destino;?>">
						<span class="fa fa-angle-double-right"></span>
						<?php echo $contenido[$nivel]['titulo'];?>
						</a>
					</div>
					<?php
				}
				else
				{
					?>
					<!-- Menúes -->
					<a class="accordion-toggle plusMinus menu-lil-font" data-toggle="collapse" href="#solapa_<?php echo $contenido[$nivel]['id'].$nivel;?>">
					<span class="fa fa-plus-square"></span>
					<?php echo $contenido[$nivel]['titulo'];?>
					</a>
					</div>
					<div class="accordion-body collapse" id="solapa_<?php echo $contenido[$nivel]['id'].$nivel;?>">
						<div class="accordion-inner">
							<div class="accordion">
								<div class="accordion-group">
									<?php
									cargarMenu($conexion, $contenido[$nivel]['id'], $nivel+1);
									?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			}
			while ($contenido[$nivel] = mysqli_fetch_array(${"resultado".$nivel}));
		}
	}

	
	function paginar($url,$limite)
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'$url';
		$config['reuse_query_string'] = TRUE;
				
		$config['per_page'] = $limite;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
						
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		//Ir al principio
		$config['first_link'] = '<<';
		$config['first_tag_open'] = '<li class="waves-effect">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<li class="waves-effect">';
		$config['last_tag_close'] = '</li>';
		
		//link siguiente '>'
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li class="waves-effect">';
		$config['next_tag_close'] = '</li>';
		
		//link anterior '<'
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li class="waves-effect">';
		$config['prev_tag_close'] = '</li>';
		
		//numeros
		$config['num_tag_open'] = '<li class="waves-effect">';
		$config['num_tag_close'] = '</li>';

		//activo
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		
		//Inicializo la paginación
		return $this->pagination->initialize($config);
		// Cargar Vistas
		//$this->load->view('cf_tabla',$baseDatos);
	}

	
	function modal_chico($id,$titulo,$contenido)
	{
		echo "<div class='modal fade' id='".$id."'>
	 	   <div class='modal-dialog'>
	 	       <div class='modal-content'>
	 	           <div class='modal-header' style='background-color:#4f70ce'>
	 	               <div class='navbar-brand text-light'>".$titulo."</div>
	 	               <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
	 	               <span aria-hidden='true'>&times;</span>
	 	               </button>
	 	           </div>
	 	           
	 	           <div class='modal-body'>"
	 	               .$contenido."
	 	           </div>
	 	           
	 	       </div>
	 	   </div>
		</div>";
	}

	
	function modal_grande($id,$titulo,$contenido)
	{
		echo "<div class='modal fade bd-example-modal-lg' id='".$id."'>
	 	   <div class='modal-dialog modal-lg'>
	 	       <div class='modal-content'>
	 	           <div class='modal-header' style='background-color:#4f70ce'>
	 	               <div class='navbar-brand text-light'>".$titulo."</div>
	 	               <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
	 	               <span aria-hidden='true'>&times;</span>
	 	               </button>
	 	           </div>
	 	           
	 	           <div class='modal-body'>"
	 	               .$contenido."
	 	           </div>
	 	           
	 	       </div>
	 	   </div>
		</div>";
	}

?>