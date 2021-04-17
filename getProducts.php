<?php

include('conexion.php');


switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $get = true;
        session_start();
        include_once "dbecommerce.php";
        $query = "SELECT * from productos";
        $mysqli->begin_transaction();
        try {
            // Ejecuta query
            $result = $mysqli->query($query);
            $mysqli->commit();
            $mysqli->close();

            //$row = mysqli_fetch_assoc($result);
            $products = $result->fetch_all(MYSQLI_ASSOC);

            echo json_encode($products,JSON_UNESCAPED_UNICODE);

        } catch (mysqli_sql_exception $exception) {
            $mysqli->rollback();
            throw $exception;
        }
        break;

}




?>

