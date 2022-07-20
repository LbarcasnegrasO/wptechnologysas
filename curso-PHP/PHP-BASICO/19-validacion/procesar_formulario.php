<?php
$error = "faltan_valores";

if (!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['edad']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
	$error = "ok";

	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$edad = (int) $_POST['edad'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	// Validar el nombre
	if (!is_string($nombre) || preg_match("/[0-9]+/", $nombre)) {
		$error = 'nombre';
	}
	// Validar el apellido
	if (!is_string($apellidos) || preg_match("/[0-9]+/", $apellidos)) {
		$error = 'apellidos';
	}
	// Validar la edad
	if (!is_int($edad) || !filter_var($edad, FILTER_VALIDATE_INT)) {
		$error = 'edad';
	}
	// Validar el Email
	if (!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = 'email';
	}
	// Validar la Password
	if (empty($pass) || strlen($pass)<5) {
		$error = 'password';
	}

}else{
	$error = "faltan_valores";
	
}

if ($error != 'ok') {
	header("Location:index.php?error=$error");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Validar formulario en PHP</title>
</head>
<body>
	<?php if ($error == 'ok'):?>
	<h1>Datos validos correctamente</h1>
	<h3>Estos son sus datos:</h3>
		<p><?=$nombre?></p>
		<p><?=$apellidos?></p>
		<p><?=$edad?></p>
		<p><?=$email?></p>
	<?php endif; ?>
</body>
</html>