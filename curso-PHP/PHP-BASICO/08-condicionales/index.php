<?php
/*
	CONDICIONAL IF
IF:
  if(condicio){
	instrucciones
  }else{
	otras instrucciones
  }


  // OPERADORES DE COMPARACION
  == igual
  === identico
  != diferente
  <> diferente
  !== no identico
  < menor que
  > mayor que
  <= menor o igual que
  >= mayor o igual que

*/
// Ejemplo 1
  $color = "verde";

  if ($color == "rojo") {
  	// code...
  	echo "EL COLOR ES ROJO";
  }
  else{
  	echo "El color NO es ROJO";
  }
  echo "<br>";

// Ejemplo 2

  $year = 2019;

  if ($year >= 2019) {
  	// code...
  	echo "Estamos de 2019 en adelante ";
  }else{
  	echo "Es un año anterior a 2019";
  }

  // Ejemplo 3

  $nombre = "David Bisbal";
  $ciudad = "Cartagena";
  $continente = "Europa";
  $edad = 49;
  $mayoria_edad = 18;

  if ($edad >= $mayoria_edad) {
  	// code...
  	echo "<h1>$nombre es mayor de edad</h1>";
  	if ($continente == "America") {
  		// code...
  		echo "<h2>Y es de $ciudad</h2>";
  	}else {
  		echo "No es Americano";
  	}
  	
  }else{
  	echo "<h2>$nombre No es mayor de edad</h2>";
  }
  echo "<hr>";
// Ejemplo 4
$dia = 2;

/*if ($dia == 1) {
  // code...
  echo "Es Lunes";
}else{
  if ($dia == 2) {
    // code...
    echo "Es Martes";
  }else{
    if ($dia == 3) {
      // code...
      echo "Es Miercoles";
    }else {
      if ($dia == 4) {
        // code...
        echo "Es Juevez";
      }else{
        if ($dia == 5) {
          // code...
          echo "Es Viernes";
        }else{
          echo " es fin de semana";
        }
      }
    }
  }
}
*/
if ($dia == 1) {
  echo "LUNES";
}elseif ($dia == 2) {
  echo "MARTES";
}elseif ($dia == 3) {
  echo "MIERCOLES";
}elseif ($dia == 4) {
  echo "JUEVES";
}elseif ($dia == 5) {
  echo "VIERNES";
}elseif ($dia == 6) {
  echo "Fin de semana";
}

echo "<hr>";
$pais = "Francia";
if ($pais == "Mexico" || $pais == "España" || $pais == "Colombia") {
  echo "En este pais se habla español";
}else{
  echo "No se habla Español";
}
echo "<hr>";
// SWITCH

$dia = 2;

switch ($dia) {
  case 1:
    echo "LUNES";
    break;
  case 2:
    echo "MARTES";
    break;
  case 3:
    echo "MIERCOLES";
    break;
  case 4:
    echo "JUEVES";
    break;
  case 1:
    echo "VIERNES";
    break;
  
  default:
    echo "ES FIN DE SEMANA";
    break;
}
echo "<hr>";

// GOTO
goto marca;

echo "<h3>INSTRUCCION 1</h3>";
echo "<h3>INSTRUCCION 2</h3>";
echo "<h3>INSTRUCCION 3</h3>";
echo "<h3>INSTRUCCION 4</h3>";

marca:
echo "<h1>Me he saltado 4 echos</h1>";