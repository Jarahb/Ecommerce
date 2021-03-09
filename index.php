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
<div class="login-box">
  <div class="login-logo">
    <a><b>Miss</b>Margott</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicie sesión para comenzar a comprar</p>
 <!--   Validamos el inicio de sesión mediante la bbdd-->
        <?php
        if(isset($_REQUEST['login'])) { 
           session_start();
           $email=$_REQUEST['email']??'';
           $pasword=$_REQUEST['pass']??'';
           $pasword=md5($pasword); //Hemos añadido a la contraseña encriptación mediante md5
           include_once "dbecommerce.php";
           $con=mysqli_connect($host,$user,$pass,$db);
           $query ="SELECT id,email,nombre from admin where email='".$email."' and pass='".$pasword."'; ";
           $res=mysqli_query($con,$query); //Petición de registro
           $row=mysqli_fetch_assoc($res); //Parámetro para obtener el resultado
           if ($row){  //Petición para almacene estos datos de la sesión
              $_SESSION['id']=$row['id'];
              $_SESSION['email']=$row['email'];
              $_SESSION['nombre']=$row['nombre'];
              header("location: panel.php"); 
            } else {  //Si el registro no es correcto muestra una alerta
         ?>
                <div class="alert alert-danger" role="alert">
                    Error de inicio de sesión. Por favor revise sus datos: email y contraseña
                </div>
            <?php
             }
         }    
            ?>
      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Acceder</button>
          </div>
          <!-- /.col -->
        </div>
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Ups.Olvidé mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="registro.php" class="text-center">Registrar un nuevo socio</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
