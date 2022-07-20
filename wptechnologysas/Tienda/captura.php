<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();
/*
$payment = $_GET['payment_id'];
$status = $_GET['status'];
$payment_type = $_GET['payment_type'];
$order_id = $_GET['merchant_order_id'];



echo "<h3>Pago exitoso</h3>";

echo $payment .'<br>';
echo $status .'<br>';
echo $payment_type .'<br>';
echo $order_id .'<br>';

unset($_SESSION['carrito']);*/
    $id_transaccion = $_GET['payment_id'];
    $status = $_GET['status'];
    $email = $_GET['payment_type'];
    $id_cliente = $_GET['merchant_order_id'];

    $sql = $con->prepare("INSERT INTO compra (id_transaccion, status, email, id_cliente) VALUE (?,?,?,?)");
    $sql->execute([$id_transaccion, $status, $email, $id_cliente]);
    $id = $con->lastInsertID();

    if( $id > 0){
        $producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        if ($producto != null){
            foreach ($producto as $clave => $cantidad){
          
              $sql = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE id=? AND activo=1");
              $sql->execute([$clave]);
              $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

              $precio = $row_prod['precio'];
              $descuento = $row_prod['descuento'];
              $precio_desc = $precio - (($precio * $descuento) /100) ;

              $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUE (?,?,?,?,?)");
              $sql_insert->execute([$id, $clave, $row_prod['nombre'], $precio_desc, $cantidad]);
            }
            include 'enviar_email.php';
        }
        header("Location: completado2.php");
        unset($_SESSION['carrito']);
        exit;
    }