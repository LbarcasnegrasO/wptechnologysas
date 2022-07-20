<?php

/* BUCLE WHILE
 Estructura de control que itera o repite la ejecucion de una serie de instrucciones
 tantas veces como sea necesario, en base a una condición.

 while(condición){
	bloque de instruccciones
	otra instruccion
 }

 */

 $numero = 0;

 while ($numero <= 100) {
 	echo $numero;

 	if ($numero != 100) {
 		echo ", ";
 	}

 	$numero++;
 }
 echo "<hr/>";

 // Ejemplo


 if(isset($_GET['numero'])) {
 	// Cambiar tipo de datos
 	$numero = (int)$_GET['numero'];
 }else{
 	$numero = 1;
 }

 echo "<h1>Tabla de multiplicar del número $numero</h1>";

 $contador = 1;
 while ($contador <= 10) {
 	// code...
 	echo "$numero x $contador =" .($numero*$contador)."<br>";
 	$contador++;
 }
echo "<hr>";
/* DO WHILE
do{
	//BLOQUE DE INSTRUCCIONES

}while (condition);
*/

$edad = 17;
$contador = 1;

do{
	echo "Tienes acceso al local privado $contador <br>";
	$contador++;
}while($edad >= 18 && $contador <= 10 );