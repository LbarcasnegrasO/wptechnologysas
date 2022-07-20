<?php
/*
Constante
es un contenedor de informacion que no puede variar

*/
define('nombre', 'Luis Oviedo');
define('web','luisoviedo.com');

echo '<h1>'.nombre.'</h1>' ;
echo '<h1>'.web.'</h1>' ;

// variable
$web = "victorroblesweb.es/academy";
$web = "luisoviedo.com/mso";
echo '<h1>'.$web.'</h1>';

// Constantes predefinidas

echo __FUNCTION__;