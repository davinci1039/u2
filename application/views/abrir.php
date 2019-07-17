<?php
header("Content-type: application/pdf"); 
header("Content-Disposition: inline; filename=$nombre.pdf");
readfile($file);
?>