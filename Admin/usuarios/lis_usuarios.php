<?php include '../extend/header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Usuarios
        <small>Listado de usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php">Usuarios</a></li>
        <li class="active">Lista de Usuarios</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Usuarios Registrados</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input id="buscar" type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button id="buscar" type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <?php 
                    $sel = $con->query("SELECT * FROM usuarios");
                    $row = mysqli_num_rows($sel);
                ?>
              <table class="table table-hover">
                <tr>
                  <th>Foto</th>
                  <th>Nick</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Correo</th>
                  <th>Nivel</th>
                  <th></th>
                  <th>Estatus</th>
                  <th>Eliminar</th>
                </tr>
                <?php while($f = $sel->fetch_assoc()){ ?>
                <tr>
                  <td><img src="<?php echo $f['foto'] ?>" width="50" style="border-radius: 50%;" alt=""></td>
                  <td><?php echo $f['nick'] ?></td>
                  <td><?php echo $f['nombre'] ?></td>
                  <td><?php echo $f['apellidos'] ?></td>
                  <td><?php echo $f['correo'] ?></td>
                  <td>
                    <form action="up_nivel.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $f['id'] ?>">
                      <select class="form-control" name="nivel" required> 
                      <option value="<?php echo $f['nivel'] ?>"><?php echo $f['nivel'] ?></option>
                        <option value="Administrador">Administrador</option>
                        <option value="Operativo">Operativo</option>
                        <option value="Asesor">Asesor</option>
                      </select>
                  </td>
                  <td>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i></button>
                    </form>
                  </td>
                  <td>
                    <?php if($f['estatus']==1): ?>
                      <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['estatus'] ?>"><i class="fa fa-fw fa-toggle-on" style="color:green; font-size:25px;"></i></a>
                      <?php else: ?>
                        <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['estatus'] ?>"><i class="fa fa-fw fa-toggle-off" style="color:red; font-size:25px;"></i></a>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="#" onclick="swal({ title: '??Estas seguro que deseas eliminarlo?', 
                      text: 'Al eliminarlo, no podra recuperarlo', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', 
                      cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminar'}).then(function() { 
                      location.href='eliminar_usuario.php?id=<?php echo $f['id'] ?>';})"><i class="fa fa-fw fa-trash-o" style="color:red; font-size:25px;"></i>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>


</div>
<!-- /.content-wrapper -->

<?php include '../extend/scripts.php'; ?>
<script src="../js/validaciones.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>