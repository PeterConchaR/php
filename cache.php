//Función en php la cual agrega la fecha y hora de la ultima modificación de nuestro archivo.

function last_version ($file_name)
{ 
  echo $file_name."?v=".filemtime($file_name); 
}

/* 
  Nos devolvera algo como esto
  <script src="libreria.js?v=1362236584"></script>
*/

<?php
// Donde guardamos nuestras funciones, incluyendo esta de versionar.
  include 'funciones.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<title></title>
<!-- Dentro de src= creamos un "echo" con los "shortcut" o atajos de php, recordemos que <?= ?> es igual a <?php echo ?>. -->
<script src="<?=last_version('libreria.js');?>"></script>
</head>
<body>
