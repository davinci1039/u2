<?php 
	function traer_ruta($ruta)
	{
		switch ($ruta) 
		{
			case 'flowsheet':
				$ruta = 'E:\\documentos\\planos\\flowsheet\\';
				break;
			case 'uas':
				$ruta = 'E:\\documentos\\UAS\\';
				break;
			case 'fdp':
				$ruta = 'E:\\documentos\\planos\\fdp\\';
				break;
			case 'cq':
				$ruta = 'E:\\documentos\\planos\\cq-dm\\';
				break;
			case 'dm':
				$ruta = 'E:\\documentos\\planos\\cq-dm\\';
				break;
			case 'cq-dm':
				$ruta = 'E:\\documentos\\planos\\cq-dm\\';
				break;
			case 'hdoc':
				$ruta = 'E:\\documentos\\tecnica\\pem\\hdoc\\';
				break;
			case 'centralizado':
				$ruta = 'E:\\documentos\\planos\\electrica\\centralizado\\';
				break;
			case 'lets':
				$ruta = 'E:\\documentos\\planos\\electrica\\lets\\';
				break;
			case 'mdo':
				$ruta = 'E:\\documentos\\mandatoria\\mdo\\';
				break;
			case 'pprr':
				$ruta = 'E:\\documentos\\mandatoria\\pprr\\';
				break;
			case 'ccpp':
				$ruta = 'E:\\documentos\\tecnica\\ccpp\\';
				break;
			case 'cf':
				$ruta = 'E:\\documentos\\planos\\cf\\';
				break;
			return $ruta;
		}
	}

	function existe_archivo($ruta)
	{
		if(file_exists($ruta))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function copiar_archivo($archivo,$destino,$reemplazo)
	{
		//función estándar para mover un archivo a un lugar. 
		//Crea una copia. Si ese copiado es exitoso, lo borra del lugar original
		if($reemplazo == 1)
		{
			copy($archivo, $destino);
    		return TRUE;
		}
		elseif($reemplazo == 0) 
		{
			if (!file_exists($destino)) 
			{
    			copy($archivo, $destino);
    			return TRUE;
    		}
    		else 
    		{
    			return FALSE;
    		}
		}
	}

	function cargar_archivo($archivo,$destino)
	{
		$target_dir = $destino;
		$target_file = $target_dir . basename($_FILES["$archivo"]["name"]);
		$uploadOk = 1;

		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Lo siento, archivo ya existente.";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Archivo no cargado.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["$archivo"]["tmp_name"], $target_file)) {
		        echo "El archivo ". basename( $_FILES["$archivo"]["name"]). " ha sido cargado.";
		    } else {
		        echo "Lo siento, hubo un error en la carga del archivo.";
		    }
		}
	}

	
	function guardar_superado($archivo,$revision,$destino)
	{
		//guarda el archivo viejo en la carpeta "documentos_históricos" con una marca de agua de "Superado" y la revisión en el nombre
		$archivo_destino = $destino." - Rev.".$revision." (superado)";
		rename($archivo,$archivo_destino);
		return TRUE;
	}

	
	function guardar_anulado($archivo,$revision,$destino)
	{
		//guarda el archivo anulado en la carpeta "documentos_anulados" con una marca de agua de "Anulado"
		$archivo_destino = $destino." - Rev.".$revision." (anulado)";
		rename($archivo,$archivo_destino);
		return TRUE;
	}


	function crear_carpeta($ruta,$nombre_carpeta)
	{
		//crea una carpeta con el $nombre_carpeta
	}

?>