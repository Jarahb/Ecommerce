<?php
$query ="SELECT email, nombre, telefono, direccion, poblacion, provincia, codigopostal FROM usuarios;";
$r = $mysqli->query($query);
$usuarios = $r->fetch_all(MYSQLI_ASSOC);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
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
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Población</th>
                    <th>Provincia</th>
                    <th>Código Postal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($usuarios as $usuario): ?>
                  <tr>
                      <td><?= $usuario['email']; ?></td>
                      <td><?= $usuario['nombre']; ?></td>
                      <td><?= ($usuario['telefono'] == 0) ? '-' : $usuario['telefono'];?></td>
                      <td><?= $usuario['direccion']; ?></td>
                      <td><?= $usuario['poblacion']; ?></td>
                      <td><?= $usuario['provincia']; ?></td>
                      <td><?= $usuario['codigopostal']; ?></td>
                  </tr>
                  <?php endforeach;?>
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
