
<?php

/* Datos de conexión a bd */
$host = "localhost"; //El servidor que utilizaremos
$user = "Jara";//"Jara";     //El usuario que tiene todos los permisos en la bbdd
$pass = "123456";//"123456";    //La contraseña
$db = "ecommerce";  //El nombre de la bbdd

/* configuro conexión */
$mysqli = new mysqli($host, $user, $pass, $db);
$mysqli->set_charset('utf8');
?>