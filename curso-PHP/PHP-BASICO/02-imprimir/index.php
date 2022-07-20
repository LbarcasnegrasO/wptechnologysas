<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Imprimir por pantalla - Master en PHP</title>
</head>
<body>
	<h1>Master en PHP - victorroblesweb.es</h1>
	<?="Bienvenido al curso mas grande PHP"?>
	<?php 
	//Titulas de la Barra
		echo "<h1>Listado de Juegos</h1>";
		/*  Esta es una lista
		    de video juegos
		    modernos */
		echo "<ul>"
		        ."<li>GTA</li>"
		        ."<li>FIFA</li>"
		        ."<li>Mario Bros</li>"
		    ."</ul>";
		    //  Parrafo explicativo
		echo '<p>Esta es toda'.' - '.'lista de Juegos</p>';
	?>

</body>
</html>