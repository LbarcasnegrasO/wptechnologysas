<?php

define("CLIENT_ID", "AVB-CCG007QXwr02BAynOqbWltmQNjSGQ_XhO1Uke8RPeTs12GL4G-a2x6z9PrVyPskzbb0m5M308kXS");
define("TOKEN_MP", "TEST-1740555477622903-122119-4ca623ecd45333b50935bad28f2c227b-256812641");
define("CURRENCY", "USD");
define("KEY_TOKEN", "APR.wqc-354*");
define("MONEDA", "$");

session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>