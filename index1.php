<!DOCTYPE html>
<html lang="en">
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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
              <nav class="navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                  <li class="nav-item d-none d-sm-inline-block">
                    <a href="index1.php" class="nav-link">Inicio</a>
                  </li>
                  <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contacto</a>
                  </li>
                </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" action="index1.php">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre']??''; ?>" >
            <input type="hidden" name="modulo" value="productos">
              <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
              </div>
          </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa-bell fa-cart-plus"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class=" fa fa-user" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
       <div class="row mt-1"> 
           <!--Consulta para que muestre sólo una imagen x producto en el index-->
            <?php
                include_once "dbecommerce.php";
                $con=mysqli_connect($host,$user,$pass,$db);
                $where="where 1=1 ";
                $nombre=mysqli_real_escape_string($con,$_REQUEST['nombre']??'');
                if( empty($nombre)==false){
                    $where="and nombre like '%".$nombre."%'";
                }
                //Creo un paginador para los resultados de búsqueda de la consulta
                $queryCuenta="SELECT COUNT(*) as cuenta FROM productos $where ;";
                $resCuenta=mysqli_query($con,$queryCuenta);
                $rowCuenta=mysqli_fetch_assoc($resCuenta);
                $totalRegistros=$rowCuenta['cuenta'];
                //Elementos que me va a mostrar por página
                $elementosPorPagina=12;
                $totalPaginas=ceil($totalRegistros/$elementosPorPagina);
                //Paginación:Si no hay ninguna pag seleccionada me seleccionará por defecto la 1
                $paginaSel=$_REQUEST['pagina']??false;
                if($paginaSel==false){
                    $inicioLimite=0;
                    $paginaSel=1;
                } else{
                    $inicioLimite=($paginaSel-1)* $elementosPorPagina;
                }
                $limite=" limit$inicioLimite,$elementosPorPagina ";
                $query="SELECT
                    p.id,
                    p.nombre,
                    p.precio,
                    p.existencias,
                    f.web_path
                    FROM
                    productos AS p
                    INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                    INNER JOIN files AS f ON f.id=pf.file_id
                    $where
                    GROUP BY p.id
                    $limite
                    ";
                $res=mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($res)){
                ?>
                   <div class="col-lg-4 col-md-6 col-sm-12">
                       <div class="card border-primary">
                           <img class="card-img-top img-thumbnail" src="<?php echo $row['web_path'] ?>" alt="">
                           <div class="card-body">
                               <h2 class="card-title"><strong><?php echo $row['nombre'] ?></strong></h2>
                               <p class="card-text"><strong>Precio: </strong><?php echo $row['precio'] ?></p>
                               <p class="card-text"><strong>Existencias: </strong><?php echo $row['existencias'] ?></p>
                               <a href="#" class="btn btn-primary">Ver</a>
                           </div>
                       </div>
                   </div>
                <?php
                }
                ?>
       </div>
        <!--Paginador:Creo los botones del paginador-->
        <?php
        if($totalPaginas>0){
        ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php
                        if( $paginaSel!=1 ){
                    ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="index1.php?modulo=productos&pagina=<?php echo ($paginaSel-1); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Anterior</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                        for($i=1;$i<=$totalPaginas;$i++){
                     ?>
                    <li class="page-item <?php echo ($paginaSel==$i)?" active ":" "; ?>">
                    <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php
                    }
                    ?>
                    <?php
                        if( $paginaSel!=$totalPaginas ){
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel+1); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Siguente</span>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </nav>
        <?php
        }
        ?>
        </div>
    </div>
</div>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/dataTables.select.min.js"></script>
<script type="text/javascript" src="js/dataTables.editor.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>