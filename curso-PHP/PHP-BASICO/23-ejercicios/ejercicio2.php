<?php
/*
1. Una función
2. Validad un email con filter_var
3. Recoger variable por get y validarla
4. Mostrar el resultado
*/

function validarEmail($email){
	$status = "No valido.";
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$status = "Valido";
	}

	return $status;
}


if (isset($_GET['email'])) {
	echo validarEmail($_GET['email']);
}else{
	echo "<h3>Pasa por GET un email o correo...</h3>";
}