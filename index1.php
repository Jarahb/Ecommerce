<?php
        include_once "dbecommerce.php";
        include_once "helpers/helpers.php";

        $where = "WHERE 1=1";
        $nombre = $mysqli->real_escape_string($_REQUEST['nombre'] ?? '');
        if (empty($nombre) == false) {
            $where = "WHERE nombre like '%" . $nombre . "%'";
        }

        //Creo un paginador para los resultados de búsqueda de la consulta
        $queryCuenta = "SELECT COUNT(*) as cuenta FROM productos $where;";
        $totalRegistros = mysqli_fetch_assoc($mysqli->query($queryCuenta))['cuenta'];

        //Elementos que me va a mostrar por página
        $elementosPorPagina = 12;
        $totalPaginas = ceil($totalRegistros / $elementosPorPagina);
        //Paginación:Si no hay ninguna pag seleccionada me seleccionará por defecto la 1
        $paginaSel = $_REQUEST['pagina'] ?? false;
        if ($paginaSel == false) {
            $inicioLimite = 0;
            $paginaSel = 1;
        } else {
            $inicioLimite = ($paginaSel - 1) * $elementosPorPagina;
        }
        $limite = "LIMIT $inicioLimite, $elementosPorPagina ";
        $query = "SELECT
        p.id,
        p.nombre,
        p.precio,
        f.web_path
        FROM
        productos AS p
        INNER JOIN productos_files AS pf ON pf.producto_id=p.id
        INNER JOIN files AS f ON f.id=pf.file_id
        $where
        GROUP BY p.id
        ORDER BY p.nombre ASC
        $limite
        ;";
        $r = $mysqli->query($query);
        $infoProducto = $r->fetch_all(MYSQLI_ASSOC);

        $fmt = numfmt_create( 'es_ES', NumberFormatter::CURRENCY );
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Miss Margott</title>
    <!--Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
     <!--Ionicons--> 
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!--Theme style--> 
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
     <!--Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
     <!--Own custom styles--> 
    <link rel="stylesheet" href="dist/css/customstyle.css">
     <!--Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <?php
        session_start();
        $accion=$_REQUEST['accion']??'';
        if($accion=='cerrar'){
            session_destroy();
            header("Refresh:0");
        }
    ?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
            include_once "menu.php";
            $modulo = $_REQUEST['modulo'] ?? '';
            if($modulo=="productos" || $modulo=="" ){
                    include_once "productos.php";
            }
            if ($modulo == "detalleproducto") {
                include_once "detalleproducto.php";
            }
            if ($modulo == "carrito") {
                include_once "carrito.php";
            }
            if( $modulo=="envio" ){
                    include_once "envio.php";
                }
            if( $modulo=="pasarela" ){
                    include_once "pasarela.php";
                }
            if( $modulo=="factura" ){
                    include_once "factura.php";
                }
            ?>
        </div>
    </div>
</div>
    
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/dataTables.select.min.js"></script>
<script type="text/javascript" src="js/dataTables.editor.min.js"></script>
<script type="text/javascript" src="dist/js/ecommerce.js"></script>
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