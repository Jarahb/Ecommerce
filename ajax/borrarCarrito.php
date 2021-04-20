<?php

/* Coloco en las cookies un array vacio para borrar todos los productos.
*  Recibo un arreglo vacio en la funcion borrarCarrito para borrar el carrito
*/

$productos_vacio = json_encode([]);
setcookie("productos", $productos_vacio);
echo $productos_vacio;

?>
