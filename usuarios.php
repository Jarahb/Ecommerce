
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
                    <th>Telefono</th>
                    <th>Poblacion</th>
                    <th>Provincia</th>
                    <th>Codigo postal</th>  
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                      
                      $query ="SELECT id,email,nombre, from admin ";
                      $res=mysqli_query($con,$query); //Petición de registro

                      while($row = mysqli_fetch_assoc($res)){ //Mientras el row contenga registros va a hacer:
                      ?>
                  <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['email'] ?></td>7
                    <td><?php echo $row['teléfono'] ?></td>
                    <td><?php echo $row['población'] ?></td>
                    <td><?php echo $row['provincia'] ?></td>
                    <td><?php echo $row['código postal'] ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
    </div>
        <!-- /.row -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
