<?php

/*
Ejercio 2. Escribir in string en PHP que nos muestre por pantalla todos los numeros pares que hay del 1 al 100.
*/

for ($i=1; $i <=100 ; $i++) { 
	// code...
	if ($i%2 == 0) {
		echo $i."<br>";
	}
}