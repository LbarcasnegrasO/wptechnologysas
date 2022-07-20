<?php

/*
 Crear un array con el contenido de la tabla:
 ACCION   AVENTURA   DEPORTES
 GTA      ASSASINS   FIFA 21
 COD      CRASH      PES 21
 PUGB     Prince of  MOTO GP 21
          persia

Cada fila de ir en un fochero separado (includes).
*/

$tabla = array(
	"ACCION"   => array("GTA 5", "Call of Duty", "PUGB"),
	"AVENTURA" => array("Assasins Creed", "Crash Bandicoot", "Prince of Persia"),
	"DEPORTES" => array("FIFA 21", "PES 21", "Moto GP 21")
);

$categorias = array_keys($tabla);
?>

<table border="1">
	<?php require_once 'ejercicio5/encabezado.php'; ?>
	<?php require_once 'ejercicio5/primera.php'; ?>
	<?php require_once 'ejercicio5/segunda.php'; ?>
	<?php require_once 'ejercicio5/tercera.php'; ?>

	
</table>