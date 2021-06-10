<?php 
  include '../extend/header.php'; 

  $id = $con->real_escape_string(htmlentities($_GET['id']));
  $nombre = $con->real_escape_string(htmlentities($_GET['nombre']));
  $apellidos = $con->real_escape_string(htmlentities($_GET['apellidos']));
?>

<div class="content-wrapper">
<section class="content-header">
      <h1>
        Alta de Inmuebles
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php">Inmuebles</a></li>
        <li class="active">Alta de Inmuebles</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                <div class="box-header with-border">
                  <h3 class="box-title">Ingreso de propiedad para: <?php echo $nombre.' '.$apellidos?></h3>
                </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  action="ins_propiedad.php" method="post" autocomplete="off" class="form">
              <div class="box-body">
                <div class="box-header with-border">
                  <h2 class="box-title"><b><i>Datos Generales</i></b></h2>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <!--Nombre-->
                    <div class="form-group">
                      <div class="input-group">
                        <input type="hidden" name="id_cliente" value="<?php echo $id?>" required class="form-control" id="id_cliente">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="estado">Estado</label>
                      <select class="form-control" id="estados" name="estado" required>
                        <option value="" disabled selected>SELECCIONA UN ESTADO</option>
                        <?php 
                            $sel_estado = $con->prepare("SELECT * FROM estados");
                            $sel_estado->execute();
                            $res_estado = $sel_estado->get_result();
                            while($f_estado= $res_estado->fetch_assoc()){
                        ?>
                            <option value="<?php echo $f_estado['idestados'] ?>"><?php echo $f_estado['estado'] ?></option>
                          <?php
                            }
                            $sel_estado->close();
                          ?>
                      </select>
                    </div>
                    <!--Precio-->
                    <div class="form-group">
                      <label for="precio">Precio</label>
                      <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="number" name="precio" required class="form-control" id="precio" placeholder="Ingresa el precio" step="0.01">
                        <span class="input-group-addon">.00</span>
                      </div>
                    </div>

                    <!--Fraccionamiento-->
                    <div class="form-group">
                      <label for="fraccionamiento">Fraccionamiento</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-o"></i></span>
                        <input type="text" name="fraccionamiento" required class="form-control" id="fraccionamiento" placeholder="Ingresa el fraccionamiento" onblur="may(this.value, this.id)">                    
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                            
                    <!--Nombre-->
                    <div class="form-group">
                      <div class="input-group">
                        <input type="hidden" name="nombre_cliente" value="<?php echo $nombre?>" required class="form-control" id="nombre_cliente">
                        </div>
                    </div>
                    <div class="form-group res_estado">
                      
                    </div>

                    <!--Fraccionamiento-->
                    <div class="form-group">
                      <label for="calle_num">Calle y numero</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                        <input type="text" name="calle_num" required class="form-control" id="calle_num" placeholder="Ingresa la calle y numero exterior"  onblur="may(this.value, this.id)">                    
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <!--Fraccionamiento-->
                    <div class="form-group">
                      <label for="numero_int">Numero Interior</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-o"></i></span>
                        <input type="number" name="numero_int" class="form-control" id="numero_int" placeholder="Ingresa el numero interior si es que tiene" step="0.01">                    
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-body">

                <div class="box-header with-border">
                  <h2 class="box-title"><b><I>Caracteristicas</I></b></h2>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <!--Precio-->
                    <div class="form-group">
                      <label for="m2t">m² del terreno</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-object-ungroup"></i></span>
                        <input type="number" name="m2t" required class="form-control" id="m2t" placeholder="Ingresa los m² del terreno" step="0.01">
                      </div>
                    </div>

                    <!--Fraccionamiento-->
                    <div class="form-group">
                      <label for="banos">Baños</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                        <input type="number" name="banos" required class="form-control" id="banos" placeholder="Ingresa los baños" onblur="may(this.value, this.id)">                    
                      </div>
                    </div>

                    <!--Fraccionamiento-->
                    <div class="form-group">
                      <label for="plantas">Plantas</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-minus"></i></span>
                        <input type="number" name="plantas" required class="form-control" id="plantas" placeholder="Ingresa los baños" onblur="may(this.value, this.id)">                    
                      </div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label for="caracteristicas">Otras caracteristicas</label>
                      <textarea class="form-control" rows="8" cols="80" id="caracteristicas" name="caracteristicas" onblur="may(this.value, this.id)" placeholder="Enter ..."></textarea>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <!--Fraccionamiento-->
                    <div class="form-group">
                      <label for="m2c">m² de Construcción</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-object-group"></i></span>
                        <input type="number" name="m2c" required class="form-control" id="m2c" placeholder="Ingresa los metros cuadrados de construcción"  onblur="may(this.value, this.id)">                    
                      </div>
                    </div>

                    <!--Fraccionamiento-->
                    <div class="form-group">
                      <label for="recamaras">Recamaras</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                        <input type="number" name="recamaras" required class="form-control" id="recamaras" placeholder="Ingresa el numero de recamaras" step="0.01">                    
                      </div>
                    </div>

                    <!--Fraccionamiento-->
                    <div class="form-group">
                      <label for="cocheras">Cocheras</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                        <input type="number" name="cocheras" required class="form-control" id="cocheras" placeholder="Ingresa el numero de cocheras" step="0.01">                    
                      </div>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label for="observaciones">Observaciones</label>
                      <textarea class="form-control" name="observaciones" rows="8" cols="80" id="observaciones" onblur="may(this.value, this.id)"  placeholder="Enter ..."></textarea>
                    </div>

                  </div>

                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-body">

                <div class="box-header with-border">
                  <h2 class="box-title"><i><b>Datos de venta</b></i></h2>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <!--Precio-->
                    <div class="form-group">
                      <label for="forma_pago">Forma de pago</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-bank"></i></span>
                        <input required class="form-control" placeholder="Ingresa la forma de pago" type="text" name="forma_pago"  id="forma_pago" onblur="may(this.value, this.id)" pattern="[A-Z\s ]+">
                      </div>
                    </div>

                    <!-- select Asesor -->
                    <div class="form-group">
                      <label for="asesor">Asesor</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa  fa-briefcase"></i></span>
                          <?php if($_SESSION['nivel'] == 'Administrador'): ?>
                            <select class="form-control" name="asesor" required>
                              <option value="" disabled selected>ELIGE EL ASESOR</option>
                              <?php 
                                $sel = $con->prepare("SELECT nombre FROM usuarios WHERE estatus=1");
                                $sel->execute();
                                $res = $sel->get_result();
                                while($f = $res->fetch_assoc()){?>
                                  <option value="<?php echo $f['nombre']?>"><?php echo $f['nombre']?></option>
                                <?php 
                                  } 
                                  $sel->close();
                                  $con->close();
                                ?>
                            </select>
                              <?php else: ?>
                                <input type="number" readonly name="asesor" value="<?php echo $_SESSION['nombre'] ?>" required class="form-control" id="cocheras">
                          <?php endif; ?>
                        </div>
                    </div>

                    <!-- select Tipo Propiedad -->
                    <div class="form-group">
                      <label for="tipo_inmueble">Tipo de propiedad</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                          <select class="form-control" name="tipo_inmueble" required>
                            <option value="" disabled selected>ELIGE EL TIPO DE INMUEBLE</option>
                            <option value="CASA">CASA</option>
                            <option value="TERRENO">TERRENO</option>
                            <option value="LOCAL">LOCAL</option>
                            <option value="DEPARTAMENTO">DEPARTAMENTO</option>
                            <option value="CASA_EN_CONDOMINIO">CASA EN CONDOMINIO</option>
                          </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <!-- Date -->
                    <div class="form-group">
                      <label for="fecha_registro">Fecha de registro:</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input size="16" type="date" class="form-control" id="fecha_registro" name="fecha_registro">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- textarea -->
                    <div class="form-group">
                      <label for="comentario_web">Comentarios para los clientes en la web</label>
                      <textarea class="form-control" name="comentario_web" rows="8" cols="80" id="comentario_web" onblur="may(this.value, this.id)"  placeholder="Enter ..."></textarea>
                    </div>

                    <!-- select Tipo Propiedad -->
                    <div class="form-group">
                      <label for="operacion">Tipo de propiedad</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                          <select class="form-control" name="operacion" required>
                            <option value="" disabled selected  >ELIGE LA OPERACION</option>
                            <option value="VENTA">VENTA</option>
                            <option value="RENTA">RENTA</option>
                            <option value="TRASPASO">TRASPASO</option>
                            <option value="OCUPADO">OCUPADO</option>
                          </select>
                      </div>
                    </div>
                  </div>
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
<script src="../js/estados.js"></script>
<!-- Page script -->
<script type="text/javascript">
$( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>

  </script>
</body>
</html>