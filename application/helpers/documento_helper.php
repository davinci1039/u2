<?php 
	//Devolver la ruta de cada marca de agua
	function marca_agua($tipo)
	{
		switch ($marca) {
			case 'cc01':
			//
			break;
			case 'cc02':
			//
			break;
			case 'cc03':
			//
			break;
			case 'cc04':
			//
			break;
			case 'cc05':
			//
			break;
			case 'cc06':
			//
			break;
			case 'cc07':
			//
			break;
			case 'cc08':
			//
			break;
			case 'cc09':
			//
			break;
			case 'cc10':
			//
			break;
			case 'cc11':
			//
			break;
			case 'cc12':
			//
			break;
			case 'cc13':
			//
			break;
			case 'cc14':
			//
			break;
			case 'cc15':
			//
			break;
			case 'cc16':
			//
			break;
			case 'cc17':
			//
			break;
			case 'cc18':
			//
			break;
			case 'cc19':
			//
			break;
			case 'cc20':
			//
			break;
			case 'cc21':
			//
			break;
			case 'cc22':
			//
			break;
			case 'cc23':
			//
			break;
			case 'cc24':
			//
			break;
			case 'cc25':
			//
			break;
			case 'cc26':
			//
			break;
			case 'cc27':
			//
			break;
			case 'cc28':
			//
			break;
			case 'cc29':
			//
			break;
			case 'cc30':
			//
			break;
			case 'cc00': //Marca de agua vacía
			//
			break;	
			case 'info': //marca de agua sólo para información
			//
			break;	
			case 'superado':
			//
			break;	//marca de agua de superado
			case 'anulado':
			//
			break;	//marca de agua de anulado

			return $marca;
		}
	}


	//Quitar espacios en cadena de texto
	function quitar_espacios($cadena)
	{
		$cadena=str_replace(" ","",$cadena);
		return $cadena;
	}

	
	//Limpiar símbolos en cadena de texto
	function limpiar($cadena)
	{
		$cadena=str_replace("/","",$cadena);
		$cadena=str_replace("\\","",$cadena);
		$cadena=str_replace("-","",$cadena);
		$cadena=str_replace("_"," ",$cadena);
		$cadena=str_replace("&","",$cadena);
		$cadena=str_replace("%","",$cadena);
		$cadena=str_replace("(","",$cadena);
		$cadena=str_replace(")","",$cadena);
		$cadena=str_replace("=","",$cadena);
		$cadena=str_replace("?","",$cadena);
		$cadena=str_replace("¿","",$cadena);
		$cadena=str_replace("!","",$cadena);
		$cadena=str_replace("¡","",$cadena);
		$cadena=str_replace("|","",$cadena);
		$cadena=str_replace("°","",$cadena);
		$cadena=str_replace("\"","",$cadena);
		$cadena=str_replace("#","",$cadena);
		$cadena=str_replace("$","",$cadena);
		$cadena=str_replace("*","",$cadena);
		$cadena=str_replace("+","",$cadena);
		$cadena=str_replace(".","",$cadena);
		$cadena=str_replace("'","",$cadena);
		$cadena=str_replace("~","",$cadena);
		$cadena=str_replace("{","",$cadena);
		$cadena=str_replace("}","",$cadena);
		$cadena=str_replace("^","",$cadena);
		$cadena=str_replace("[","",$cadena);
		$cadena=str_replace("]","",$cadena);
		return $cadena;
	}
	

	function registros_nuevos($array)
	{
		//paso por array todos los valores nuevos (ver como pasar array por parametro)
	}

	function registros_superados($array)
	{
		//paso por array todos los valores viejos (ver como pasar array por parametro)
	}


	

	

?>