<!--Para que nadie pueda entrar al Panel sin loguearse-->
<?php
session_start();
session_regenerate_id(true); //Voy a añadir seguridad para no almacenar sesiones y actualizarlas
if(isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="cerrar"){
    session_destroy();
    header("location: index.php");
}
if( isset($_SESSION['id'])==false ){
    header("location: index.php");
}
$modulo=$_REQUEST['modulo']?? '';
include_once "dbecommerce.php";
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
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/select.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/editor.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
        <a class="nav-link" href="panel.php?modulo=editaradmin&id=<?php echo $_SESSION['id']; ?>">
          <i class="far fa-user"></i>
        </a>
        <a class="nav-link text-danger " href="panel.php?modulo=&sesion=cerrar" title="Cerrar sesión">
          <i class="fas fa-door-closed"></i>
        </a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/logo_circulo.jpg" alt="Miss Margott Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Miss Margott</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="fa fa-shopping-cart nav-icon" aria-hidden="true"></i>
              <p>
                Ecommerce
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">  <!--Añadimos la funcionalidad active para que subraye los apartados-->
                    <a href="panel.php?modulo=estadisticas" class="nav-link <?php echo ($modulo=="estadisticas" || $modulo=="" )?" active ":" "; ?>">
                        <i class="far fa-chart-bar nav-icon" aria-hidden="true"></i>
                        <p>Estadísticas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="panel.php?modulo=admin" class="nav-link <?php echo ($modulo=="admin" || $modulo=="crearadmin" || $modulo=="editaradmin")?" active ":" "; ?>">
                        <i class="far fa-user nav-icon"></i>
                        <p>Administradores</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="panel.php?modulo=usuarios" class="nav-link <?php echo ($modulo=="usuarios" )?" active ":" "; ?>">
                        <i class="far fa-user nav-icon"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="panel.php?modulo=productos" class="nav-link <?php echo ($modulo=="productos" )?" active ":" "; ?>">
                        <i class="fa fa-shopping-bag nav-icon" aria-hidden="true"></i>
                        <p>Productos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="panel.php?modulo=ventas" class="nav-link <?php echo ($modulo=="ventas" )?" active ":" "; ?>">
                        <i class="fa fa-table nav-icon" aria-hidden="true"></i>
                        <p>Ventas</p>
                    </a>
                </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!--Aquí voy a llamar a las estadísticas, administrador, productos y ventas mediante sus respectivos módulos-->
  <?php
  //Muestra una alerta cuando creas el administrador
  if(isset($_REQUEST['mensaje'])){
  ?>
    <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <?php echo $_REQUEST['mensaje']?>
    </div>
    <?php
    }
    if($modulo=="estadisticas" || $modulo==""){
        include_once "estadisticas.php";
    }
    if($modulo=="admin"){
        include_once "admin.php";
    }
     if($modulo=="productos"){
        include_once "productos.php";
    }
     if($modulo=="usuarios"){
        include_once "usuarios.php";
    }
     if($modulo=="ventas"){
        include_once "ventas.php";
    }
    if ($modulo=="crearadmin"){
        include_once"crearadmin.php";
    }
    if ($modulo=="editaradmin"){
        include_once"editaradmin.php";
    }
     if ($modulo=="productos"){
        include_once"productos.php";
    }
  ?>

</div>
<!-- ./wrapper -->


<!-- DataTables -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/dataTables.select.min.js"></script>
<script type="text/javascript" src="js/dataTables.editor.min.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>

    /* Scripts datatables */


    const langSettings = {
        "zeroRecords": "No se encontraron resultados.",
        "info": "Mostrando _START_ al _END_ de _TOTAL_ entradas.",
        "infoEmpty": "No se mostraron registros",
        "infoFiltered": " (filtrados de un total de  _MAX_ registros)",
        "lengthMenu": " Mostrar _MENU_ registros.",
        "search": "Buscar",
        "paginate": {
            "previous": "Anterior",
            "next": "Siguiente"
        }
    };

    $(document).ready(function () {
        $("#example1").DataTable({
            language:langSettings
        });
        $("#example2").DataTable({
            language:langSettings
        });
    });


  var editor;

        $(document).ready(function() {
        editor = new $.fn.dataTable.Editor( {
        ajax: "controllers/productos.php",
        table: "#tablaproductos",
        fields: [{
                label: "Nombre:",
                name: "nombre"
            }, {
                label: "Precio:",
                name: "precio"
            }, {
                label: "Existencias:",
                name: "existencias"
            },
            {
                label: "Imágenes:", //Para que me permita subir múltiples imágenes de productos
                name: "files[].id",
                type: "uploadMany",
                display: function (fileId, counter) {
                    return '<img src="' + editor.file('files', fileId).web_path + '"/>';
                },
                noFileText: 'No hay imágenes'
            }

            ]

    } );

   $('#tablaproductos').DataTable( {
        dom: "Bfrtip",
        ajax: "controllers/productos.php",
       language:langSettings,
        columns: [
            { data: "nombre" },
            { data: "precio", render: $.fn.dataTable.render.number(',', '.', 2, '€') },
            { data: "existencias" },
            {
                data: "files",
                render: function ( d ) {
                    return d.length ?
                        d.length+' imáge(nes)' :   //Muestra la cantidad de imágenes que subimos
                        'No hay imágen(es)';
                },
                title: "Imágenes"
            }
        ],
        select: true,
        buttons: [
            { extend: 'create', text:"Nuevo",  editor: editor },
            { extend: 'edit',  text:"Editar", editor: editor },
            { extend: 'remove', text:"Eliminar", editor: editor }
        ]
    } );

  });
 </script>
 <script>
     /*
   var editor;

    $(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
    ajax: "controllers/usuarios.php",
    table: "#tablausuarios",
    fields: [{
            label: "Nombre:",
            name: "nombre"
        }, {
            label: "Email:",
            name: "email"
        }, {
            label: "Teléfono:",
            name: "teléfono"
        }, {
            label: "Dirección:",
            name: "dirección"
        }, {
            label: "Población",
            name: "pobación"
        }, {
            label: "Provincia",
            name: "provincia"
        }
        ]

    } );

    var table = $('#tablausuarios').DataTable( {
         dom: "Bfrtip",
        ajax: "controllers/usuarios.php",
     columns: [
          { data: "nombre" },
          { data: "email" },
          { data: "teléfono" },
          { data: "dirección" },
          { data: "población" },
          { data: "provincia" }
         ],
         select: false,
         buttons: [
               { extend: 'create', text:"New",  editor: editor },
               { extend: 'edit',  text:"Edit", editor: editor },
               { extend: 'remove', text:"Delete", editor: editor }
         ]
     } );
 });
 */
</script>
     <script>
         $(document).ready(function () {

         $(".borrar").click(function (e) {
             e.preventDefault();
             var res = confirm("Realmente quiere eliminar al administrador?");
             if (res == true) {
                 var link = $(this).attr("href");
                 window.location = link;
             }
         });
     });
 </script>
</body>
</html>
