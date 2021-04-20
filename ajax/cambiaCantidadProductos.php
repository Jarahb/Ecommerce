<?php

$productos = json_decode(stripslashes($_COOKIE['productos']), true);

$product_index = -1;

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

$prod = $productos[$product_index];

if ($_POST['tipo'] == "mas") {
    $prod['cantidad'] = intval($prod['cantidad']) + 1;
} else if ($_POST['tipo'] == "menos" && (intval($prod['cantidad']) - 1 > 0)) {
    $prod['cantidad'] = intval($prod['cantidad']) - 1;
}

$productos[$product_index] = $prod;


$productos_json = json_encode($productos);
setcookie("productos", $productos_json);
echo $productos_json;
?>