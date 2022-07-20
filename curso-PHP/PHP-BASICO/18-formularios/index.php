<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formularios PHP y HTML</title>
</head>
<body>
	<!--autofocus="autofocus" Permite enfocar el input seleccionado de un formulario-->
	<!--disabled="disabled" Permite desabilitar un input de un formulario-->
	<!--maxleng="5" Permite ingresar el maximo digito al input dentro de un formulario -->
	<!--maxleng="5" No te permite ingresar menos del digito asignado al input dentro de un formulario -->
	<!--maxleng="5" Permite ingresar el maximo digito al input dentro de un formulario -->
	<!--pattern="[A-Z]+" Permite que se le ingrese digitos al input Mayusculas o minusculas en el formulario -->
	<!--required="required" Exigue que llenen ese campo del formulario-->
	<!--placeholder="Apellidos" descibe que datos vas a ingresar en el input-->
	<h1>Formulario</h1>
	<form action="" method="POST" enctype="multipar/form-data">
		<label for="nombre">Nombre: </label>
		<p><input type="text" name="nombre" placeholder="Ingresa tu Nombre"></p> 
		<label for="apellido">Apellido: </label>
		<p><input type="text" name="nombre" placeholder="Ingresa tu Nombre"></p>  
		<label for="boton">Botón: </label>
		<p><input type="button" name="boton" value="Cliquéame"></p> 
		<label for="sexo">Sexo: </label>
		<p>
			Hombre: <input type="checkbox" name="sexo" value="hombre" >
			Mujer: <input type="checkbox" name="sexo" value="mujer" checked="checked">
		</p> 
		<label for="color">Color: </label>
		<p><input type="color" name="color" ></p> 
		<label for="fecha">Fecha: </label>
		<p><input type="date" name="fecha" ></p>
		<label for="correo">Email: </label>
		<p><input type="email" name="correo" ></p>
		<label for="archivo">Archivo: </label>
		<p><input type="file" name="archivo" multiple="multiple" ></p>
		<label for="numero">Numero: </label>
		<p><input type="number" name="numero" ></p>
		<label for="pass">Contraseña: </label>
		<p><input type="password" name="pass" ></p>

		<label for="continente">Continentes: </label>
		<p>
			America del sur <input type="radio" name="continente" value="a,erica del sur" >
			Europa <input type="radio" name="continente" value="europa" >
			Asia <input type="radio" name="continente" value="asia" >
		</p>
		<label for="web">Pagina web: </label>
		<p><input type="url" name="web" ></p>
		<textarea></textarea><br>
		Peliculas:
		<select name="peliculas">
			<option value="spiderman">Spiderman</option>
			<option value="batman">Batman</option>
			<option value="superman">Superman</option>
			<option value="rapidos-y-furiosos">Rapidos y furiosos</option>
		</select><br>

		<input type="submit" value="Enviar">
	</form>
</body>
</html>