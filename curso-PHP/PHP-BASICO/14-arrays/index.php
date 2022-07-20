<?php 
/*
ARRAYS
Un array es una coleccion o un conjunto de datos/valores, bajo un unico nombre.
Para accede a ese valores podemos usas un indice numero o alfanumerico.
*/
$peliculas = "Batman";
$peliculas = array('Batman' ,'Spiderman', 'Superman');
$cantantes = ['2pac','Drake','Jennifer Lopez'];
// Arrays no solos pueden ser alfanumericos
// Arrays Asociativos
$personas = array(
	'nombre' => 'Luis',
	'apellidos' => 'Oviedos',
	'web' => 'luisoviedosweb.com'
);

var_dump($_GET);
echo $personas['apellidos'];

/*echo $peliculas[0];
echo "<br>";
echo $cantantes[2];
*/

// Recorrer con FOR
echo "<h1>Listado de Peliculas</h1>";

echo "<ul>";

for ($i=0; $i < count($peliculas); $i++) { 
	echo "<li>".$peliculas[$i]."</li>";
}

echo "</ul>";

// Recorrer con Foreach
echo "<h1>Listado de Cantantes</h1>";

echo "<ul>";
foreach ($cantantes as $cantante) {
	echo "<li>".$cantante."</li>";
}

echo "</ul>";


// Arrays Multidimencionales : Es una arra que contiene muchos arrays dentro

$contactos = array (
	array(
		'nombre'=> 'Antonio',
		'email'=> 'antonio@antonio.com'
	),
	array(
		'nombre'=> 'Luis',
		'email'=> 'luis@luis.com'
	),
	array(
		'nombre'=> 'Salvador',
		'email'=> 'salvador@salvador.com'
	)
);
echo $contactos[2]['email'];
echo "<br>";

foreach ($contactos
 as $key => $contacto) {
	var_dump($contacto['nombre']);
}

//