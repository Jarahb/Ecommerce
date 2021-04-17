<?php

/*
Función para comprobar si alguno de los parámetros que le pasamos
está vacío. Muy útil para hacer verificación de formularios
retun boolean
*/
function itemsEmpty(...$formdata):bool{
    $empty = false;

    foreach ($formdata as $data){
        $empty = empty($data);
        if($empty){
            //Si encuentro un elemento vacío, dejo de iterar, devuelvo error.
            break;
        }
    }
    return $empty;

}

/*
 * Color Options For Products
 */
$colorOptions = [
    ["label"=>"Negro", "name" =>"negro"],
    ["label"=>"Blanco", "name" =>"blanco"],
    ["label"=>"Azul", "name" =>"azul"],
    ["label"=>"Amarillo", "name" =>"amarillo"],
    ["label"=>"Verde", "name" =>"verde"],
    ["label"=>"Gris", "name" =>"gris"],
    ["label"=>"Rojo", "name" =>"rojo"],
    ["label"=>"Nude", "name" =>"nude"]



];
$num_opciones_tallas = 6;

function generateLabels($colorOptions, $num_opciones_tallas){
    $labels_array = [];
    $labels_array[] = ["label"=>"Nombre","name"=>"nombre"];
    $labels_array[] =  ["label"=>"Descripción","name"=>"descripcion","type"=>"textarea"];
    $labels_array[] =  ["label"=>"Precio (€):","name"=>"precio"];
    for($i=1; $i<=count($colorOptions); $i++){

        $labels_array[] = ["label"=>"Color:", "name"=>"color_".$i, "type"=>"select", "placeholder"=>"Selecciona...", "options"=>$colorOptions];

        for($j=1; $j<=$num_opciones_tallas; $j++){
            $labels_array[] =  ["label"=>"Talla:","name"=>"talla_".$i."_".$j];
            $labels_array[] =  ["label"=>"Existencias:","name"=>"existencias_talla_".$i."_".$j];
        }
    }

    return $labels_array;
}


function colorToHexMapper($colorname){
    $mappings = [
        "negro" => "#000000",
        "blanco" => "#ffffff",
        "azul" => "#007BFF",
        "amarillo" => "#FFC107",
        "verde" => "#28A745",
        "gris" => "#6C757D",
        "rojo" => "#DC3545",
        "nude" => "#E7D6C4"
    ];

    //mapea color, si no existe default a negro
    return array_key_exists($colorname,$mappings) ? $mappings[$colorname] : $mappings['negro'];
}