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