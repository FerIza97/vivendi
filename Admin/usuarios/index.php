<?php 
  include '../extend/header.php'; 
  include '../extend/permiso.php';
?>

<div class="content-wrapper">
<section class="content-header">
      <h1>
        Alta de Usuarios
        <small>Formulario de usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php">Usuarios</a></li>
        <li class="active">Alta de Usuarios</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Formulario de Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="ins_usuarios.php" method="post" class="form">
              <div class="box-body">

                <!--Nombre Completo-->
                <div class="form-group">
                  <label for="nombre">Nombre </label>
                  <input type="text" name="nombre" required autofocus class="form-control" title="NOMBRE DE LA PERSONA" pattern="[A-Z/s ]+" id="nombre" placeholder="Ingresa el nombre" onblur="may(this.value, this.id)">
                </div>

                <!--Apellidos-->
                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input type="text" name="apellidos" required autofocus class="form-control" title="APELLIDOS DE LA PERSONA" pattern="[A-Z/s ]+" id="apellidos" placeholder="Ingresa los apellidos" onblur="may(this.value, this.id)">
                </div>

                <!--Correo-->
                <div class="form-group">
                  <label for="correo">Correo Electronico</label>
                  <input type="email" name="correo" required autofocus class="form-control" title="CORREO DEL USUARIO" " id="correo" placeholder="Ingresa el correo">
                </div>

                <div class="validacioncorreo"></div>

                <!--Nombre Usuario-->
                <div class="form-group">
                  <label for="nick">Nombre de Usuario</label>
                  <input type="text" name="nick" required autofocus class="form-control" title="DEBE CONTENER 8 Y 15 LETRAS" pattern="[A-Za-z]{8,15}" id="nick" placeholder="Ingresa el nombre de usuario" onblur="may(this.value, this.id)">
                </div>

                <div class="validacion"></div>

                <!--Contraseña-->
                <div class="form-group">
                  <label for="pass1">Escribe tu contraseña</label>
                  <input type="password" name="pass1" required autofocus class="form-control" title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS" pattern="[A-Za-z0-9]{8,15}" id="pass1" placeholder="Ingresa tu contraselña">
                </div>

                <!--Verificar contraseña-->
                <div class="form-group">
                  <label for="pass2">Verificar contraseña</label>
                  <input type="password" required autofocus class="form-control" title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS" pattern="[A-Za-z0-9]{8,15}" id="pass2" placeholder="Ingresa tu contraselña">
                </div>

                <!--Seleccion de nivel-->
                <div class="form-group">
                  <label>Nivel de usuario</label>
                  <select class="form-control" name="nivel" required> 
                    <option value="Administrador">Administrador</option>
                    <option value="Operativo">Operativo</option>
                    <option value="Asesor">Asesor</option>
                  </select>
                </div>

                <!--Foto de usuario-->
                <div class="form-group">
                  <label for="exampleInputFile">Foto:</label>
                  <input name="foto" type="file" id="exampleInputFile">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="btn_guardar">Guardar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</select>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validaciones.js"></script>
</body>
</html>