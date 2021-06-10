<?php 
  include '../extend/header.php'; 
  include '../extend/permiso.php';

  $id = htmlentities($_GET['id']);
  $sel = $con->prepare("SELECT * FROM clientes WHERE id = ?");
  $sel->bind_param('i',$id);
  $sel->execute();
  $res = $sel->get_result();

  if($f = $res->fetch_assoc()){

  }
?>

<div class="content-wrapper">
<section class="content-header">
      <h1>
        Editar Clientes
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php">Clientes</a></li>
        <li class="active">Editar Clientes</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Formulario de Clientes</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="up_clientes.php" method="post" class="form">
              <div class="box-body">

                <!--Nombre Completo-->
                <div class="form-group">
                  <label for="id">Id</label>
                  <input type="number" name="id" required autofocus class="form-control" value="<?php echo $id ?>" disabled>
                </div>

                <!--Nombre Completo-->
                <div class="form-group">
                  <label for="nombre">Nombre </label>
                  <input type="text" name="nombre" required autofocus class="form-control" title="NOMBRE DE LA PERSONA" pattern="[A-Z/s ]+" id="nombre" value="<?php echo $f['nombre'] ?>" onblur="may(this.value, this.id)">
                </div>

                <!--Apellidos-->
                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input type="text" name="apellidos" required autofocus class="form-control" title="APELLIDOS DE LA PERSONA" pattern="[A-Z/s ]+" id="apellidos" value="<?php echo $f['apellidos'] ?>" onblur="may(this.value, this.id)">
                </div>

                <!--Correo-->
                <div class="form-group">
                  <label for="correo">Correo Electronico</label>
                  <input type="email" name="correo" required autofocus class="form-control" title="CORREO DEL USUARIO" " id="correo" value="<?php echo $f['correo'] ?>">
                </div>

                <div class="validacioncorreo"></div>

                <!--Direccion-->
                <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input type="text" name="direccion" required autofocus class="form-control" id="direccion" value="<?php echo $f['dirreccion'] ?>" onblur="may(this.value, this.id)">
                </div>

                <!--Telefono-->
                <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input type="text" name="telefono" required autofocus class="form-control" id="telefono" value="<?php echo $f['tel'] ?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</select>
</div>

<?php include '../extend/scripts.php'; 
    $sel->close();
    $con->close();
?>

<script src="../js/validaciones.js"></script>
</body>
</html>