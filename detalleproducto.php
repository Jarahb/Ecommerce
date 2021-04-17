<?php
$id = $mysqli->real_escape_string( $_GET['id'] ?? '');

/*$queryProducto = "SELECT id,nombre,precio, descripcion FROM productos where id='$id'; ";
$resProducto = mysqli_query($con, $queryProducto);
$rowProducto = mysqli_fetch_assoc($resProducto);
*/
$queryImagenes = "SELECT files.web_path
FROM productos
INNER JOIN productos_files ON productos_files.producto_id=productos.id
INNER JOIN files  ON files.id=productos_files.file_id
WHERE productos.id=$id;";

$imagenes =  $mysqli->query($queryImagenes)->fetch_all(MYSQLI_ASSOC);

$queryInfoProducto = "SELECT productos.nombre, productos.precio, productos.descripcion
FROM productos
WHERE productos.id=$id;";

$infoProducto =  $mysqli->query($queryInfoProducto)->fetch_all(MYSQLI_ASSOC)[0];

$coloresQuery = "SELECT grupocolores.color
FROM productos
INNER JOIN grupocolores ON grupocolores.producto_id=productos.id
WHERE productos.id=$id;";

$r = $mysqli->query($coloresQuery);
$c = $r->fetch_all(MYSQLI_ASSOC);
$colores_disponibles = [];

foreach ($c as $co){
    $colores_disponibles[] = $co["color"];
}

// Buscamos todas las tallas y existencias de cada talla para un único color (valores por defecto en ui de usuario).

$existenciasQuery = "SELECT grupocolores.color, existencias.existencias, existencias.talla
FROM productos 
INNER JOIN grupocolores ON grupocolores.producto_id=productos.id
INNER JOIN existencias ON existencias.grupocolores_id=grupocolores.id
WHERE productos.id=$id;";

$r = $mysqli->query($existenciasQuery);
$detalles = $r->fetch_all(MYSQLI_ASSOC);

$tallas_letra = ["XXS","XS","S","M","L","XL","XXL"];

$existencias_tallas_colores = [];

$isTallaLetra = false;

foreach($colores_disponibles as $cd){
    foreach($detalles as $d){
        if(strtolower($d["color"]) == strtolower($cd)){
            $existencias_tallas_colores[$cd][strtoupper($d["talla"])] = $d["existencias"];

        }
    }

    $isTallaLetra = in_array(key($existencias_tallas_colores[$cd]),$tallas_letra);

    if($isTallaLetra){

        //ordenamos por talla de letra, menor a mayor.
        uksort($existencias_tallas_colores[$cd], function($a,$b){
            $sizes = array(
                "XXS" => 0,
                "XS" => 1,
                "S" => 2,
                "M" => 3,
                "L" => 4,
                "XL" => 5,
                "XXL" => 6
            );
            $asize = $sizes[$a];
            $bsize = $sizes[$b];

            if ($asize == $bsize) {
                return 0;
            }

            return ($asize > $bsize) ? 1 : -1;
        });
    }
    else{
        ksort($existencias_tallas_colores[$cd]);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | E-commerce</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- custom CSS -->
    <link rel="stylesheet" href="dist/css/customstyle.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <!--Para que se muestre en dispositivos móviles-->
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?= $infoProducto['nombre']?></h3>
                <div class="col-12">
                    <img src="<?=$imagenes[0]['web_path'];?>" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <?php $index = 0;
                    foreach($imagenes as $img):?>
                        <div class="product-image-thumb<?= $index == 0 ? ' active' : ''?>"><img src="<?=$img['web_path']?>" alt="Product Image"></div>
                    <?php $index++;
                    endforeach;?>
                </div>
            </div>
            <!--Para que se muestre en dispositivos grandes-->
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?= ($infoProducto['nombre']) ?></h3>
                <p><?= !empty($infoProducto['descripcion']) ? (($infoProducto['descripcion'])) : ""; ?></p>

                <hr>

                <h4>Colores disponibles</h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <?php $idx = 1;
                    foreach($colorOptions as $color): ?>
                        <?php if(in_array($color["name"],$colores_disponibles)):?>
                            <label class="btn btn-default text-center <?= $idx == 1 ? "active" : "";?>">
                                <input type="radio" name="color_option" id="color_option<?=$idx;?>" value="<?= strtolower($color["name"]);?>"
                                       autocomplete="off" <?= $idx == 1 ? "checked" :""?>
                                       onClick="showTallas('tallas-<?=$color["name"]?>');">
                                <?= ucfirst($color["name"]);?>
                                <br>
                                <i class="fas fa-circle fa-2x" style="color: <?= colorToHexMapper(strtolower($color["name"]))?>"></i>
                            </label>
                        <?php endif;?>
                    <?php $idx++;
                    endforeach;?>
                </div>

                <h4 class="mt-3">Tallas</h4>

                <?php $idx2 = 1;
                foreach($colorOptions as $color): ?>
                    <?php if(in_array($color["name"],$colores_disponibles)):?>
                        <div class="btn-group btn-group-toggle tallas tallas-<?=$color["name"]?> <?= $idx2 != 1 ? 'd-none' : ''; ?>" data-toggle="buttons">
                            <?php foreach($existencias_tallas_colores[$color["name"]] as $talla => $existencias): ?>
                                <label class="btn btn-default text-center <?= $existencias <=0 ? "no-stock" : "";?>">
                                    <input type="radio" name="talla_option"
                                           value="<?=$talla?>"
                                           <?= $existencias <=0 ? "disabled" : "";?>
                                           autocomplete="off">
                                    <span class="text-xl"><?=$talla;?></span>
                                    <br>
                                    Stock: <?= $existencias;?>
                                </label>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                <?php $idx2++;
                endforeach;?>

                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        <?=numfmt_format_currency($fmt,  $infoProducto['precio'], "EUR")."\n"; ?>
                    </h2>
                </div>
                <!--Añadimos combobox para añadir la cantidad de productos-->
                <div class="mt-4">
                    Cantidad
                    <input type="number" class="form-control" id="cantidadProducto" >
                </div>
                <!--Configuramos el carrito-->
                <div class="mt-4">
                    <button class="btn btn-primary btn-lg btn-flat" id="agregarCarrito"
                    data-id="<?=$id?>"
                    data-nombre="<?=$infoProducto['nombre']?>"
                    data-web_path="<?=$imagenes[0]['web_path']?>" 
                    data-precio="<?=$infoProducto['precio']?>"
                    data-color="<?=$color['color']?>"
                    data-talla="<?=$talla['talla']?>"
                    >

                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                        Añadir
                    </button>
                </div>

                <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                </div>

            </div>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                       role="tab" aria-controls="product-desc" aria-selected="true">Descripción</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments"
                       role="tab" aria-controls="product-comments" aria-selected="false">Commentarios</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating"
                       role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                     aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
                    vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                    cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem
                    elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh,
                    congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius
                    metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum
                    at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque
                    viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat
                    a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non
                    convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat
                    fringilla sollicitudin ultrices vel metus.
                </div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                    Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet.
                    Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat
                    orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna.
                    Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec
                    aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem,
                    dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit
                    vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum.
                </div>
                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                    Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean
                    elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent
                    vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non
                    bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut.
                    Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus
                    odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna
                    vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi
                    orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper
                    posuere. Integer finibus orci vitae vehicula placerat.
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
</body>
</html>

<!-- /.card -->
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script>

    function showTallas(tallascolor){

        $('input[name=talla_option]').prop('checked', false); //reinicio seleccion talla;

        $('.tallas').removeClass('d-none');
        $('.tallas label').removeClass('active');
        $('.tallas').addClass('d-none');
        $('.'+tallascolor).removeClass('d-none');
        //$('input[name=talla_option]:checked').val()
    }

</script>