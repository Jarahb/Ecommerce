<?php
include_once "helpers/helpers.php";
include_once "dbecommerce.php";

switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        $get = true;
        break;

    case 'POST':
        $post=true;


        //Recojo datos del formulario
        $nombre = trim($_POST['nombre']);
        $email = strtolower(trim($_POST['email']));
        $telefono = trim($_POST['telefono']);
        $direccion = trim($_POST['direccion']);
        $poblacion = trim($_POST['poblacion']);
        $codigopostal = trim($_POST['codigopostal']);
        $provincia = trim($_POST['provincia']);
        $verificapassdos = trim($_POST['verificapassdos']);
        $verificapassuno = trim($_POST['verificapassuno']);

        if(itemsEmpty($nombre,$email,$direccion,$poblacion,$codigopostal,
            $provincia,$verificapassuno,$verificapassdos)){
            $error=true;
            $error_message = "Rellena los campos obligatorios (*)";
            break;
        }
        elseif($verificapassuno != $verificapassdos || empty($verificapassuno) || empty($verificapassdos)){
            $error=true;
            $error_message = "Las contraseñas no coinciden";
            break;
        }
        else{
            $error=false;
            //Ahora que ya he verificado, sanitizo:
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($telefono, FILTER_SANITIZE_NUMBER_INT);
            $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);
            $poblacion = filter_var($poblacion, FILTER_SANITIZE_STRING);
            $codigopostal = filter_var($codigopostal, FILTER_SANITIZE_NUMBER_INT);
            $provincia = filter_var($provincia, FILTER_SANITIZE_STRING);

            $pass_hasheada = password_hash($verificapassuno,PASSWORD_DEFAULT);

            //Declara query

            $query ="INSERT INTO usuarios (email, pass, nombre, telefono, direccion, poblacion, provincia, codigopostal)
                     VALUES 
                     ('".$email."','$pass_hasheada','".$nombre."','".$telefono."','".$direccion."','".$poblacion."','".$provincia."','".$codigopostal."');";


            /*$query ="INSERT INTO admin (nombre, email, pass)
                     VALUES 
                     ('$nombre','$email','$pass_hasheada');";
            */


            // Comienza transacción
            $mysqli->begin_transaction();
            try {
                // Ejecuta query
                $result = $mysqli->query($query);
                $mysqli->commit();
                $mysqli->close();

            } catch (mysqli_sql_exception $exception) {
                $mysqli->rollback();
                throw $exception;
            }
            //$row=mysqli_fetch_assoc($result);
            break;
        }
    default:
        break;
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro</title>
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
  <!-- Own custom styles -->
  <link rel="stylesheet" href="dist/css/customstyle.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">

<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <?php if((isset($get) && $get) || (isset($error) && $error)):?>

                <div class="login-logo">
                Registro Clientes
            </div>
                <!-- /.login-logo -->

                <div class="card pb-2">
                <div class="card-body login-card-body">
                    <?php if (isset($error) && $error):?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $error_message; ?>
                        </div>
                    <?php endif;?>
                    <form action="registro.php" class="will-validate show-invalid <?=(isset($error) ) ? 'validated-form' : '' ?>" method="post" novalidate>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <p class="m-0 p-0 mb-2 font-weight-bold">Nombre y Apellidos(*)</p>
                                <div class="input-group mb-3 <?=(isset($error) && empty($nombre)) ? 'invalid-input' : '' ?>">
                                    <input type="email" class="form-control"
                                           placeholder="Nombre y apellidos" name="nombre" value="<?= $nombre ?? ''?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="m-0 p-0 mb-2 font-weight-bold">Email(*)</p>
                                <div class="input-group mb-3 <?=(isset($error) && empty($email)) ? 'invalid-input' : '' ?>">
                                    <input type="email" class="form-control"
                                           placeholder="Email" name="email" value="<?= $email ?? ''?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <p class="m-0 p-0 mb-2 font-weight-bold">Teléfono</p>
                                <div class="input-group mb-3">
                                    <input type="tel" class="form-control" placeholder="Teléfono" name="telefono" value="<?= $telefono ?? ''?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="m-0 p-0 mb-2 font-weight-bold">Dirección(*)</p>
                                <div class="input-group mb-3 <?=(isset($error) && empty($direccion)) ? 'invalid-input' : '' ?>">
                                    <input type="text" class="form-control"
                                           placeholder="Dirección" name="direccion" value="<?= $direccion ?? ''?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-location-arrow"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <p class="m-0 p-0 mb-2 font-weight-bold">Población(*)</p>
                                <div class="input-group mb-3 <?= (isset($error) && empty($poblacion)) ? 'invalid-input' : '' ?>">
                                    <input type="text" class="form-control"
                                           placeholder="Población" name="poblacion" value="<?= $poblacion ?? ''?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-globe"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <p class="m-0 p-0 mb-2 font-weight-bold">Código Postal(*)</p>
                                <div class="input-group mb-3 <?=(isset($error) && empty($codigopostal)) ? 'invalid-input' : '' ?>">
                                    <input type="text" class="form-control"
                                           placeholder="C.P." name="codigopostal" value="<?= $codigopostal ?? ''?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-mail-bulk"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <p class="m-0 p-0 mb-2 font-weight-bold">Provincia(*)</p>
                                <div class="input-group mb-3 <?=(isset($error) && empty($provincia)) ? 'invalid-input' : '' ?>">
                                    <input type="text" class="form-control"
                                           placeholder="Provincia" name="provincia" value="<?= $provincia ?? ''?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-globe-europe"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-lg-6">
                                <p class="m-0 p-0 mb-2 font-weight-bold">Contraseña(*)</p>
                                <div class="input-group mb-3
                                <?=(isset($error) && empty($verificapassuno) || $verificapassuno != $verificapassdos) ? 'invalid-input' : '' ?>">
                                    <input type="password" class="form-control" placeholder="" name="verificapassuno">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p class="m-0 p-0 mb-2 font-weight-bold">Verifica contraseña(*)</p>
                                <div class="input-group mb-3
                                <?=(isset($error) && empty($verificapassuno) || $verificapassuno != $verificapassdos) ? 'invalid-input' : '' ?>">
                                    <input type="password" class="form-control" placeholder="" name="verificapassdos">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <!-- /.col -->
                            <div class="col-4 offset-4">
                                <button type="submit" class="btn btn-primary btn-block" name="registro">Registro</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>

            <?php elseif(isset($post) && $post && isset($error) && !$error):?>
                    <div class="alert alert-info text-center" role="alert">
                        Registro completado con éxito. Pincha <a href="index.php">aquí</a> para acceder al login.
                    </div>
            <?php endif;?>
        </div>
    </div>
</div>
</body>