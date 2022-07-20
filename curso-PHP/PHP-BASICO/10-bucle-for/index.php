<?php

/* FOR
for(variable contador, condición, actualizando contador){
	// BLOQUE DE INSTRUCCIONES
}



$resultado = 0;

for ($i=0; $i <=100; $i++) { 
	$resultado += $i;
	echo "<p>$resultado</p>";
}

echo "<h1>El resultado es: $resultado</h1>";
*/
// Ejemplo tabla multiplicar


 if(isset($_GET['numero'])) {
 	// Cambiar tipo de datos
 	$numero = (int)$_GET['numero'];
 }else{
 	$numero = 1;
 }

 echo "<h1>Tabla de multiplicar del número $numero</h1>";

 
 for($contador = 1; $contador <= 10; $contador++) {
 	// code...

    if ($numero == 45) {
        echo "No se pueden mostrar estas operaciones prohibidas";
        // Break : Da la funcion detener el bucle
        break;
    }
 	echo "$numero x $contador =" .($numero*$contador)."<br>";
 }
