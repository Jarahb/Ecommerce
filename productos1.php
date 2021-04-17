<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                  <div id="customForm">
                      <fieldset class="general mb-3">
                          <legend>Información General</legend>
                          <editor-field name="nombre"></editor-field>
                          <editor-field name="descripcion"></editor-field>
                          <editor-field name="precio"></editor-field>
                          <editor-field name="files[].id"></editor-field>
                      </fieldset>
                      <?php for($x=1; $x<=count($colorOptions); $x++): ?>
                          <fieldset class="color color<?=$x != 1 ? ($x." d-none") : $x;?> mb-3">
                              <legend>Color <?=$x;?></legend>
                              <editor-field name="color_<?=$x;?>"></editor-field>
                              <p class="text-center mt-2"><u>Tallajes</u></p>

                              <?php for($y=1; $y<=$num_opciones_tallas; $y++):?>

                              <div class="tallas<?= $y==1 ? '' : ' d-none'; ?>">
                                  <editor-field name="talla_<?=$x."_".$y?>"></editor-field>
                                  <editor-field name="existencias_talla_<?=$x."_".$y?>"></editor-field>
                                  <hr class="w-50 mb-0"/>
                              </div>

                              <?php endfor;?>
                              <button type="button" class="btn btn-sm color color<?=$x;?> m-2" onClick="addTalla('color<?=$x?>')">Añadir talla</button>
                          </fieldset>
                      <?php endfor; ?>
                      <button id="add-color" type="button" class="btn add-color">Nuevo Color</button>
                </div>
                  <table id="tablaproductos"  class="table table-bordered table-hover">
                      <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                          <th>Imágenes</th>
                      </tr>
                      </thead>
                  </table>       
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>





