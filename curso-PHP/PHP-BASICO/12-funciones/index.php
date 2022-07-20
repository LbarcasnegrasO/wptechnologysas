<?php 
/*
FUNCIONES : Una funcion es un conjunto de funciones agrupadas bajo un nombre concreto y que pueden reutilizarse solamente unvocando a la funcion tantas veces como queramos.

function nombreDeMiFuncion(4parametro){
	// BLOQUE / CONJUNTO DE INSTRUCCIONES
}
*/

// EJEMPLO 1
/*
function muestraNombres(){
	echo "Luis Oviedo <br>";
	echo "Richard Oviedo <br>";
	echo "Kimberly Oviedo <br>";
	echo "Nayibis Oviedo <br>";
	echo "<hr>";
}

// Invocar funcion
muestraNombres();
muestraNombres();
muestraNombres();
*/
// EJEMPLO 2

function tabla($numero){
	echo "<h3> Tabla de multiplicar del numero: $numero </h3>";

	for ($i = 1; $i <= 10; $i++) { 
		$operacion = $numero*$i;
		echo "$numero x $i = $operacion <br>";
	}
}

/*
if (isset($_GET['numero'])) {
	tabla($_GET['numero']);
	tabla(9);
	tabla(4);
}else {
	echo "No hay numero para la tabla";
}

for ($i = 1; $i <=10; $i++) { 
	tabla($i);
}




// Ejemplo 3 Varios parametros

function calculadora($numero1, $numero2, $negrita = false){
	// Conjunto de instrucciones a ejecutar
	$suma = $numero1+$numero2;
	$resta = $numero1-$numero2;
	$multi = $numero1*$numero2;
	$division = $numero1/$numero2;


	if ($negrita) {
		echo "<h1>";
	}

	echo "Suma: $suma <br>";
	echo "Resta: $resta <br>";
	echo "Multiplicacion: $multi <br>";
	echo "Division: $division <br>";
	if ($negrita) {
		echo "</h1>";
	}
	echo "<hr>";
}
calculadora(10, 30);
calculadora(12, 55, true);
calculadora(15, 32);
*/

// Ejemplo 4 Varios parametros con RETURN

function calculadora($numero1, $numero2, $negrita = false){
	// Conjunto de instrucciones a ejecutar
	$suma = $numero1+$numero2;
	$resta = $numero1-$numero2;
	$multi = $numero1*$numero2;
	$division = $numero1/$numero2;

	$cadena_texto = "";
	if ($negrita) {
		$cadena_texto .= "<h1>";
	}

	$cadena_texto .="Suma: $suma <br>";
	$cadena_texto .= "Resta: $resta <br>";
	$cadena_texto .= "Multiplicacion: $multi <br>";
	$cadena_texto .= "Division: $division <br>";

	if ($negrita) {
		$cadena_texto .= "</h1>";
	}
	$cadena_texto .= "<hr>";

	return $cadena_texto;
}
echo calculadora(10, 30);
echo calculadora(12, 55, true);
echo calculadora(15, 32);

// EJEMPLO 4
function getNombre($nombre){
	$texto = "El nombre es: $nombre";
	return $texto;
}
function getApellidos($apellidos){
	$texto = "Los apellidos son: $apellidos";
	return $texto;
}

function devuelveElNombre($nombre, $apellidos){
	$texto = getNombre($nombre)
	."<br>".
	getApellidos($apellidos);
	return $texto;
}

echo devuelveElNombre("Luis", "Barcasnegras Oviedo");