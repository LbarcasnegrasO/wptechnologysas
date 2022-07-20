<?php 
/*
Es un mecanismo en el cual se almacenan datos del usuario en el servidor para asi poder rastrear al usuario cuando vuelva a la web.

Cookies: Es un fichero que se almacena en el ordenador del usuario que visita la web, con el fin de recordar datos o rastrear el comportamiento del mismo en la web.
*/
setcookie("micookie", "valor de mi galleta");

// cookie con expiracion
setcookie("unyear", "valor de mi cookie de 365 dias", time()+(60*60*24*365));

header('Location:ver_cookies.php');
?>

