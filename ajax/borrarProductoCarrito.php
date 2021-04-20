<?php

$productos = json_decode(stripslashes($_COOKIE['productos']), true);

$product_index = -1;

//Recojo datos del producto a añadir
$id = intval($_POST['id']);
$color = $_POST['color'];
$talla = $_POST['talla'];

for ($i = 0; $i < count($productos); $i++) {
    $prod = $productos[$i];

    if(intval($prod['id']) == $id && $prod['color'] == $color && $prod['talla'] == $talla){
        $product_index = $i;
        break;
    }

}

unset($productos[$product_index]);
$productos = array_values($productos);

$productos_json = json_encode($productos);

setcookie("productos", $productos_json);

echo $productos_json;


?>