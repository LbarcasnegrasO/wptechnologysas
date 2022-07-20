<?php
require('Model/conexion.php');

$con = new Conexion();

$usuarios = $con->getUsers();

require('views/vistaUsuarios.php');