<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtNacimiento"]) || empty($_POST["txtCorreo"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $telefono = $_POST["txtTelefono"];
    $nacimiento = $_POST["txtNacimiento"];
    $correo = $_POST["txtCorreo"];
    
    $sentencia = $bd->prepare("INSERT INTO user(firstname,lastname,phonenumber,birthdate,email) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$telefono,$nacimiento,$correo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>