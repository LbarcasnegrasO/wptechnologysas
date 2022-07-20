<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Subir archivos PHP</title>
</head>
<body>
	<h1>Subir Imagenes con PHP</h1>
	<form action="upload.php" method="POST" enctype="multipart/form-data">

		<input type="file" name="archivo" id="archivo">
		<input type="submit" value="Enviar" name="subir">

	</form>

	<h1>Listado de imagenes</h1>
	<?php 
		$gestor = opendir('./images');

		if ($gestor) :
			// code...
			while (($image = readdir($gestor)) !== false) :
				if ($image != '.' && $image != '..') :
					echo "<img src='images/$image' width='200px'/><br>";
				endif;
			endwhile;
		endif;
	?>
</body>
</html>