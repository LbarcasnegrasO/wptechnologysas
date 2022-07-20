<?php 
/*
Calcular el salario de un trabajador que es igual ($3500) con su porcentaje en impuesto del 20%
*/

$trabajador = 3500;
$des_imp = 20;

$pago = (($trabajador/100)*$des_imp);

echo "Su pago es:  $pago";