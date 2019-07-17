<?php 
	//Indexar todos los archivos PDF de la ruta 'E:/documentos/tecnica/ic/cf' y guardarlos ordenados en la base de datos
	function indexarCF($ruta) {
		if(is_dir($ruta))
		{
	   	    $dir = opendir($ruta);
	        while(($archivo = readdir($dir)) != false) 
	        {
	            if($archivo != "." and $archivo != ".." and $archivo !="Thumbs.db" and $archivo != ".svn")
	            {		
	                $ruta_completa = str_replace("\\", "/", $ruta)."/".$archivo;
					if(is_dir($ruta_completa)) 
					{
						//caso carpetas, sigo ejecutando
						indexarCF(str_replace("\\", "/", $ruta)."/".$archivo);
					}
					elseif(stripos($archivo,"pdf") !== FALSE)
					{
						//caso archivos, lo guardo si no existe
						$ruta_completa = $ruta."/".$archivo;
						$indexar_model = new Indexar_model;
						
						//chequeo si el archivo existe en BBDD; si existe sigo recorriendo, si no existe lo agrego
						if($indexar_model->indexar_model->contarResultados($ruta_completa) == 0)
						{
							//info del archivo a guardar
							$path_parts = pathinfo($ruta_completa); 
							$explotar_ruta = explode("/", $path_parts['dirname']);
							$explotar_nombre = explode("_", $path_parts['filename']);
							
							//asigno variables
							$cf = $explotar_ruta[5];
							$uas = $explotar_nombre[0];
							$kks = $explotar_nombre[1];
							$om690 = $explotar_nombre[2];
							if($om690 != ''){$kks = $kks."-".$om690;}
							$numero = end($explotar_nombre);

							//Sentencia Insert
							$indexar_model->indexar_model->indexarCF($cf,$uas,$kks,$numero,$ruta_completa,$puenteo=0);
							
							//Muestro Salida
							echo "Se agregó el registro <b>".$uas."-".$kks."-".$numero."<b><br>";
						}
					}
				}
	       	}
			closedir($dir);
	    }
	}

	function depurarCF()
	{
		$CI = get_instance();
		$CI->load->model('indexar_model');
		$datos = $CI->indexar_model->getTabla('complejos_funcionales');
		foreach ($datos as $d) 
		{
			if (file_exists($d->link)==FALSE) {
				$datos = array('link' => 'Anulado');
				$CI->indexar_model->actualizarFila('complejos_funcionales', $d->id, $datos);
			}
		}
		return "terminó de depurar.<br><br>==============================<br><br>";
	}
?>