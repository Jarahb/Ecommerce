<!--Bot�n eliminar administrador mediante el panel administracci�n-->
<?php
include_once "dbecommerce.php";
$con=mysqli_connect($host,$user,$pass,$db);
if(isset($_REQUEST['idBorrar'])){
    $id=mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
    $query="DELETE from admin where id='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
        ?>
        <div class="alert alert-warning float-right" role="alert">
            Administrador borrado con exito
        </div>
        <?php
    }else{
         ?>
         <div class="alert alert-danger float-right" role="alert">
             Error al eliminar <?php echo mysqli_error($con); ?>
         </div>
        <?php
    }
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administradores</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones
                      <a href="panel.php?modulo=crearadmin"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                      
                      $query ="SELECT id,email,nombre from admin ";
                      $res=mysqli_query($con,$query); //Petici�n de registro

                      while($row = mysqli_fetch_assoc($res)){ //Mientras el row contenga registros va a hacer:
                      ?>
                  <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td> <!--A�adimos los botones para editar y borrar administradores-->
                        <a href="panel.php?modulo=editaradmin&id=<?php echo $row['id'] ?>" style="margin-right: 5px;"> <i class="fas fa-edit"></i></a>
                        <a href="panel.php?modulo=admin&idBorrar=<?php echo $row['id'] ?>" class="text-danger borrar"> <i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>