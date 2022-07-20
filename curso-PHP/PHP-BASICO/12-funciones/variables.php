<?php 

/*
Variables locales: Son las que tienen dentro de una funcion y no pueden der usadas fuera de la funcion, solo estan disponibles dentro. A no ser que hagamos un return.

Variables Globales: Son las que se declaran fuera de una funcion y estan disponibles dentro y fuera de las funciones.
*/
$frase = "Ni los genios son tan genios, ni los mediocres son tan mediocres";

echo "$frase";

function holaMundo(){
	// variable global
	global $frase;
	echo "<h1>$frase</h1>";

	// variable local con return
	$year = 2019;
	echo "<h1>$year</h1>";

	return $year;
}

echo holaMundo();

// Funciones variables

function buenosDias(){
	return "<h1>Hola Buenos días :)</h2>";
}

function buenosTardes(){
	return "<h1>Hey que tal ha ido la comida??</h2>";
}

function buenosNoches(){
	return "<h1>¿Te vas a dormir ya? Buenas noches!!</h2>";
}

$horario = "Dias";

$miFuncion = "buenos".$horario;
echo $miFuncion();