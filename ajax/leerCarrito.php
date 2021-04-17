<?php

/*Vamos a deserializar lo que encuentre en las cookies 'productos'
 Lo vamos a imprimir mediante un JSON  */

$productos = isset($_COOKIE['productos']) ? json_decode(stripslashes($_COOKIE['productos']), true) : [];
echo json_encode($productos);
?>
