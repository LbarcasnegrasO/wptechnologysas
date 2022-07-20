<?php 
// Operadores aritmeticos

$numero1 = 65;
$numero2 = 33;

echo 'Suma es: '.($numero1+$numero2).'<br>';
echo 'Resta es: '.($numero1-$numero2).'<br>';
echo 'Multiplicacion es : '.($numero1*$numero2).'<br>';
echo 'Division es: '.($numero1/$numero2).'<br>';
echo 'Resto/Modulo es: '.($numero1%$numero2);

// Operadores incremento y decremento

$year = 2019;



//Incremento
//$year = $year + 1;
$year++;

//Decremento
//$year = $year - 1;
$year--;

//Pre-incremento
//$year = 1 + $year;
++$year;

//Pre-decremento
//$year = 1 - $year;
--$year;

echo "<h1>".$year."</h1>";

// Operadores de asignacion
$edad = 55;

echo $edad.'<br>';

//$edad = $edad + 5;
echo ($edad+=5);