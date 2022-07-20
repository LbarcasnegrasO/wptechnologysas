<?php

/*
Ejercicio 1. hacer un programa en PHP que tenga un array con 8 numeros enteros y que haga lo siguiente:
- Recorrerlo y mostrarlo
- Ordenarlo y mostrarlo
- Mostrar su longitud
- Buscar algun elemento (buscar por el parametro que me lleve por la web)
*/

// FUNCIONES
function mostrarArray($numeros_par){
	$resultado = "";

	foreach ($numeros_par as $key => $numero_par) {
		// $resultado = $resultado.$numero_par."<br>";
	$resultado .= $numero_par."<br>";
	}

	return $resultado;
}
// Crear el array
$numeros_par = [2,4,6,10,12,8,14];

// Recorrer y mostrar
echo "<h1>Los numeros pares son:</h1>";

echo mostrarArray($numeros_par);



echo "</ul>";

// Ordenar y mostra
echo "<h1>Ordenar y mostrar</h1>";
asort($numeros_par);
echo mostrarArray($numeros_par);

// Mostrar su longitud
echo "<h1>Numero total de elementos</h1>";
echo count($numeros_par);

// Buaqueda en el Array
if (isset($_GET['numeros_par'])) { // BUSQUEDA POR GET

	$busqueda = $_GET['numeros_par'];

	echo "<h1>Buscar en el array el numero $busqueda</h1>";

	$search = array_search($busqueda, $numeros_par);

	if (!empty($search)) {
		echo "<h4>El numero buscado existe en el array, en el indice: $search</h4>";
	}else {
		echo "No existe el numero buscado";
	}
}