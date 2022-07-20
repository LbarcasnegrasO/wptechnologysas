<?php

$cantantes = ['2pac','Drake','Jennifer Lopez', 'Alfredo'];
$numeros = [1,2,5,8,3,4];

asort($cantantes); // Ordenar por orden Alfabetico
sort($numeros);
var_dump($numeros);
echo "<br>";

// Añadir elementos array
$cantantes[] = "Natos";
array_push($cantantes, "waor");

// Eliminar elementos de un array
array_pop($cantantes); // Elimina el ultimo elemento de una array
unset($cantantes[2]);  // Elimina el elemento cual le indiques

// Sacar elemento aleatorio de una array

$indice = array_rand($cantantes);
echo $cantantes[$indice];
echo "<br>";

// Dar la vuelta a los datos de un arreglo
var_dump(array_reverse($numeros));
echo "<br>";

// Buscar dentro de un array
$resultado = array_search('Alfredo', $cantantes);
var_dump($resultado);
echo "<br>";

// Contar numero de elementos
echo sizeof($cantantes); // o echo count
