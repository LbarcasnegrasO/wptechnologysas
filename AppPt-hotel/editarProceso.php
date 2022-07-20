<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['id'];
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $telefono = $_POST["txtTelefono"];
    $nacimiento = $_POST["txtNacimiento"];
    $correo = $_POST["txtCorreo"];
    

    $sentencia = $bd->prepare("UPDATE user SET firstname = ?, lastname = ?, phonenumber = ?, birthdate = ?, email = ? where id = ?;");
    $resultado = $sentencia->execute([$nombre, $apellido, $telefono, $nacimiento, $correo, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>