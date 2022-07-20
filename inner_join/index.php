<?php
// CONEXION A LA BASE DE DATOS 
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "hotel_baru";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);
?>

<html lang="es">
	<head> 
		<title>ITIC TUTORIALES</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h3>Unir Varias Tablas con una Consulta (INNER JOIN)</h3>
			</div>
		</header>

		<section>
			<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">Tipo de habitacion </th>
					<th class="pad-basic">Fecha de inicio </th>
					<th class="pad-basic">Fecha de salida </th>
					<th class="pad-basic">Numero de cuartos </th>
					<th class="pad-basic">Numero de reservaciones</th>
					<th class="pad-basic">Cuartos disponobles</th>
				<tr>

				<?php

				$query="SELECT R.room_type_id, R.startdate, R.enddate,R.admin_id,
							   Rt.nof
						FROM reservation R
						INNER JOIN rooms_type Rt ON R.room_type_id = Rt.id";
				$consulta = $conexionBD->query($query);
				while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
						echo'
						<tr>
						<td>'.$fila['room_type'].'</td>
						<td>'.$fila['startdate'].'</td>
						<td>'.$fila['enddate'].'</td>
						<td>'.$fila['admin_id'].'</td>
						<td>'.$fila['nof'].'</td>
						<td>'.$fila[''].'</td>
						</tr>
						';
					}


				?>

			</table>
		</section>
</body>
</html>

