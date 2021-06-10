<?php include '../extend/header.php';
  include '../extend/permiso.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perfil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../usuarios/<?php echo $_SESSION['foto'] ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION['nombre'] ?> <?php echo $_SESSION['apellidos'] ?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION['nivel'] ?></p>

              

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#foto" data-toggle="tab">Editar foto</a></li>
              <li><a href="#datos" data-toggle="tab">Editar Datos de Perfil</a></li>
              <li><a href="#settings" data-toggle="tab">Editar Contraseña</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="foto">
                <form class="form-horizontal">
                    <!--Foto de usuario-->
                    <div class="form-group">
                        <label for="exampleInputFile" class="col-sm-2 control-label">Foto:</label>
                        <input name="foto" type="file" id="exampleInputFile" >
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
