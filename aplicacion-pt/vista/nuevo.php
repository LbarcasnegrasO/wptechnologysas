<?php
require_once("layouts/header.php");
?>
<h1 class="text-center">NUEVO</h1>
<form action="" method="GET">
    <input type="text" placeholder="Ingrese el nombre" name="firstname"><br/>
    <input type="text" placeholder="Ingrese los apellidos" name="lastname"><br/>
    <input type="number" placeholder="Ingrese su celular" name="phonenumber"><br/>
    <input type="date" placeholder="Ingrese fecha nacimiento" name="birthdate"><br/>
    <input type="email" placeholder="Ingrese el correo" name="email"><br/>
    <input type="submit" class="btn" name="btn" value="GUARDAR"><br/>
    <input type="hidden" name="m" value="guardar">
</form>


<?php
require_once("layouts/footer.php");