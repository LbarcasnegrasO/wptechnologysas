<?php
if (!is_dir('mi_carpeta')){
	mkdir('mi_carpeta',0777) or die('no se puede crear la  carpeta'); // Crear directorios
}else {
	echo "<h1>Ya existe la carpeta</h1>";
}

//rmdir('mi_carpeta'); // Borrar directorios 
echo "<hr><h1>Contenido carpeta</h1>";

if ($gestor = opendir('./mi_carpeta')) {
	while (false !== ($archivo = readdir($gestor))) {
		if($archivo != '.' && $archivo != '..'){
		echo $archivo."<br>";
		}
	}
}