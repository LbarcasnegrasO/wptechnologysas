<?php
/*
Ejercicio 3. Escribir un programa que imprima por pantalla los cuadrados (un numero multiplicado´por si mismo) de los 40 primeros numeros naturales.
PD: Utilizar bucle while.

$numero = 0;
while ($numero <= 40) {
	$cuadrado = $numero*$numero;
	echo "<h3>El cuadrado de $numero es:$cuadrado<h3>";

	$numero++;
	
}
*/
for ($numero = 0; $numero <= 40; $numero++) {
	$cuadrado = $numero*$numero;
	echo "<h3>El cuadrado de $numero es: $cuadrado<h3>";
	
}