<?php 
  include '../extend/header.php'; 
  include '../extend/permiso.php';
?>

<div class="content-wrapper">
<section class="content-header">
      <h1>
        Alta de Clientes
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php">Clientes</a></li>
        <li class="active">Alta de Clientes</li>
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
            <form role="form" action="ins_clientes.php" method="post" class="form">
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

                <!--Direccion-->
                <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input type="text" name="direccion" required autofocus class="form-control" id="direccion" placeholder="Ingresa la direccion" onblur="may(this.value, this.id)">
                </div>

                <!--Telefono-->
                <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input type="text" name="telefono" required autofocus class="form-control" id="telefono" placeholder="Ingresa tu numero de telefono">
                </div>

                <!--Asesor-->
                <div class="form-group">
                  <label for="asesor">Asesor</label>
                  <input type="text" required autofocus class="form-control" disabled id="asesor" name="asesor" value="<?php echo $_SESSION['nombre'] ?>">
                </div>

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