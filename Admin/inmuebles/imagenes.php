<?php
include '../extend/header.php';
$id = htmlentities($_GET['id']);
$sel = $con->prepare("SELECT foto_principal FROM inventario WHERE propiedad = ? ");
$sel->bind_param('s', $id);
$sel->execute();
$res = $sel->get_result();
if ($f =$res->fetch_assoc()) {
    $foto = $f['foto_principal'];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>Actualizar Foto de Propiedad</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Inmuebles</a></li>
        <li class="active">Foto</li>
      </ol>
    </section>

     <!-- Main content -->
     <section class="content">

<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo $foto ?>" alt="User profile picture" style="width:250px; height:250px;">

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#foto" data-toggle="tab">Foto Principal</a></li>
        <li><a href="#datos" data-toggle="tab">Cargar Imagenes</a></li>
      </ul>
      <div class="tab-content">
      <div class="tab-pane active" id="foto">
          <form class="form-horizontal" action="uploadimg.php" method="post" enctype="multipart/form-data">
              <!--Foto de usuario-->
              <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-2 control-label">Foto:</label>
                  <input type="text" name="id" value="<?php echo $id ?>">
                  <input name="image" type="file" id="exampleInputFile" >
              </div> 
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Actualizar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="datos">
          <form class="form-horizontal" action="up_perfil.php" method="post">
            <div class="form-group">
              <label for="nombre" class="col-sm-2 control-label">Nombre</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="correo" class="col-sm-2 control-label">Correo</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $_SESSION['correo'] ?>">
              </div>

              <div class="validacioncorreo"></div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger" id="btnguardar">Guardar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
          <form class="form-horizontal" action="up_pass.php" method="post">
            <div class="form-group">
              <label for="pass1" class="col-sm-2 control-label">Contraseña</label>

              <div class="col-sm-10">
                <input type="password" title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS" pattern="[A-Za-z0-9]{8,15}" class="form-control" id="pass1" name="pass1" placeholder="Contraseña" required autofocus>
              </div>
            </div>
            <div class="form-group">
              <label for="pass2" class="col-sm-2 control-label">Verificar Contraseña</label>

              <div class="col-sm-10">
                <input type="password" required autofocus class="form-control" title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS" pattern="[A-Za-z0-9]{8,15}" name="pass2" id="pass2" placeholder="Ingresa tu contraselña">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn_guardar">Actualizar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
<!-- /.content -->

<?php  include '../extend/scripts.php'; ?>
<script src="../js/validaciones.js"></script>
</body>
</html>
