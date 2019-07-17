<?php
header("Content-type:application/pdf");

// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename='$nombre.pdf'");

// The PDF source is in original.pdf
readfile($file);
?>