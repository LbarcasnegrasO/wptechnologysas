<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "clientes";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);


// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){
    $sqlClientes = mysqli_query($conexionBD,"SELECT * FROM campañaCRM WHERE id=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlClientes) > 0){
        $clientes = mysqli_fetch_all($sqlClientes,MYSQLI_ASSOC);
        echo json_encode($clientes);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar"])){
    $sqlClientes = mysqli_query($conexionBD,"DELETE FROM campañaCRM WHERE id=".$_GET["borrar"]);
    if($sqlClientes){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos de nombre y correo
if(isset($_GET["insertar"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombres=$data->nombres;
    $apellidos=$data->apellidos;
    $telefonos=$data->telefonos;
    $direcciones=$data->direcciones;

        if(($direcciones!="")&&($nombres!="")&&($apellidos!="")&&($telefonos!="")){
            $sqlClientes = mysqli_query($conexionBD,"INSERT INTO campañaCRM(nombres,apellidos,telefonos,direcciones) VALUES('$nombres','$apellidos','$telefonos','$direcciones') ");
            echo json_encode(["success"=>1]);
        }
    exit();
}
// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización
if(isset($_GET["actualizar"])){
    
    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $nombres=$data->nombres;
    $direcciones=$data->direcciones;
    
    $sqlEmpleaados = mysqli_query($conexionBD,"UPDATE campañaCRM SET nombres='$nombres',direcciones='$direcciones' WHERE id='$id'");
    echo json_encode(["success"=>1]);
    exit();
}
// Consulta todos los registros de la tabla empleados
$sqlClientes = mysqli_query($conexionBD,"SELECT * FROM campañaCRM ");
if(mysqli_num_rows($sqlClientes) > 0){
    $clientes = mysqli_fetch_all($sqlClientes,MYSQLI_ASSOC);
    echo json_encode($clientes);
}
else{ echo json_encode([["success"=>0]]); }

?>
