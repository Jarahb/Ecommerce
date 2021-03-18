<?php

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $get = true;

      /*  $DEBUG=false;

         if ($DEBUG){
            session_start();
            include_once "dbecommerce.php";
            $email = "jaruky22@hotmail.com";
            $query = "SELECT id, nombre WHERE email='jaruky22@hotmail.com'";
            $result = $mysqli->query($query);
            $mysqli->commit();
            $mysqli->close();
            $row = mysqli_fetch_assoc($result); //Parámetro para obtener el resultado
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['nombre'] =  $email;
            header("location: panel.php");
        }

        break; */

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
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['nombre'] = $row['nombre'];
                header("location: panel.php");
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


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Miss Margott</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<?php if((isset($get) && $get) || (isset($error) && $error)):?>
<div class="login-box">
    <div class="login-logo">
        <a><b>Miss</b>Margott</a>
    </div>
    <!-- /.login-logo -->
    <div class="card pb-2">
        <div class="card-body login-card-body">
            <?php if (isset($error) && $error):?>
                <div class="alert alert-danger" role="alert">
                    Error de login: usuario y/o contraseña incorrectos.
                </div>
            <?php endif;?>
            <p class="login-box-msg">Inicia sesión para comenzar a comprar</p>

            <form method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="secreto" value="">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4 offset-4">
                        <button type="submit" class="btn btn-primary btn-block" name="login">Acceder</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>

        <!-- /.social-auth-links -->

        <p class="text-center mb-1">
            <a href="#">Olvidé mi contraseña</a>
        </p>
        <p class="text-center mb-0">
            <a href="registro.php" class="text-center">¿No eres usuario aún? Regístrate aquí</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
<!-- /.login-box -->
<?php endif;?>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>