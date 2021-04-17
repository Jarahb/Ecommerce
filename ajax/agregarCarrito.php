<?php


$productos = isset($_COOKIE['productos']) ? json_decode(stripslashes($_COOKIE['productos']), true) : [];

$siYaEstaProducto = false;

//Recojo datos del producto a añadir
$id = intval($_POST['id']);
$nombre = $_POST['nombre'];
$web_path = $_POST['web_path'];
$cantidad = intval($_POST['cantidad']);
$precio =  floatval($_POST['precio']);
$color = $_POST['color'];
$talla = $_POST['talla'];


if (count($productos) > 0) {

    foreach ($productos as $prod) {

        //Miro a ver si el producto que añadí está ya en el carrito
        // Si es el mismo producto, pero distinta talla y/o color, entonces lo añado.
        if ($prod['id'] == $_POST['id'] && $prod['color'] == $color && $prod['talla'] == $talla) {
            $prod['cantidad']= intval($prod['cantidad']) + $cantidad;
            $siYaEstaProducto=true;
            break;

        }
    }
}

//Ejecuta en caso de que no esté el producto en el carrito

if (!$siYaEstaProducto) {
    $nuevo = [
        "id" => $id,
        "nombre" => $nombre,
        "web_path" => $web_path,
        "cantidad" => $cantidad,
        "precio" => $precio,
        "color" => $color,
        "talla" => $talla
    ];

    array_push($productos, $nuevo);
}

$productos_json = json_encode($productos);

setcookie("productos", $productos_json);

echo $productos_json;

?>



