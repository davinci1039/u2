<?php
	$conexion = mysqli_connect("doccnaii", "root", "bilingue", "doccnaii"); 
	ini_set('max_execution_time', 0);
	//if(!headers_sent()) {
		header('Content-type: text/html; charset=cp1252');
		header("Cache-Control: no-cache, must-revalidate");
	//}
	//echo "la conexión se hizo";
?>