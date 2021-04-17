<?php
include 'conexion.php';

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo "GET";
        $get = true;
        break;

    case 'POST':

        $post = true;
        session_start();
        include_once "dbecommerce.php";
        //Recojo datos del formulario
        $email = filter_var(strtolower(trim($_POST['email'])), FILTER_SANITIZE_EMAIL);
        $pass = trim($_POST['secreto']);

        $query = "SELECT id, nombre, email, pass from admin where email='" . $email . "'; ";
        // Comienza transacción
        $mysqli->begin_transaction();
        try {
            // Ejecuta query
            $result = $mysqli->query($query);
            $mysqli->commit();
            $mysqli->close();
            $row = mysqli_fetch_assoc($result); //Parámetro para obtener el resultado
            if ($row && password_verify($pass, $row['pass'])) {  //Petición para almacene estos datos de la sesión
                echo json_encode($row,JSON_UNESCAPED_UNICODE);
            }
            else{
                $error=true;
            }

        } catch (mysqli_sql_exception $exception) {
            $mysqli->rollback();
            throw $exception;
        }
        break;
    default:
        break;
}

?>