<?php include '../extend/header.php'; 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Clientes
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php">Clientes</a></li>
        <li class="active">Lista de clientes</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Clientes Registrados</h3>

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
                    $sel = $con->query("SELECT * FROM clientes");
                    $row = mysqli_num_rows($sel);
                ?>
              <table class="table table-hover">
                <tr>
                    <th>Vista</th>
                    <th>Cliente</th>
                    <th>Propiedad</th>
                    <th>Precio</th>
                    <th>Credito</th>
                    <th>Asesor</th>
                    <th>Tipo</th>
                    <th>Operacion</th>
                    <th>Opciones</th>
                </tr>
                <?php
                    $sel = $con->prepare("SELECT propiedad,consecutivo,nombre_cliente,calle_num,fraccionamiento,estado,municipio,precio,forma_pago,asesor,tipo_inmueble,operacion FROM inventario WHERE estatus = 'ACTIVO' ");
                    $sel->execute();
                    $res = $sel->get_result();
                    while ($f =$res->fetch_assoc()) {
                ?>
                      <tr>
                        <td><a href="modal.php?id=<?php echo $f['propiedad'] ?>" type="button" id="cargar" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye circle"></i></a></td>
                        <td><?php echo $f['nombre_cliente'] ?></td>
                        <td><?php echo $f['calle_num'].' '.$f['fraccionamiento'].' '.$f['estado'].' ,'.$f['municipio'] ?></td>
                        <td><?php echo "$". number_format($f['precio'],2); ?></td>
                        <td><?php echo $f['forma_pago'] ?></td>
                        <td><?php echo $f['asesor'] ?></td>
                        <td><?php echo $f['tipo_inmueble'] ?></td>
                        <td><?php echo $f['operacion'] ?></td>
                        <td><a href="imagenes.php?id=<?php echo $f['propiedad'] ?>" ><i class="fa fa-eye circle"></i></a></td>
                      </tr>
                    <?php }
                    $sel->close();
                    $con->close();
                    ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="res_modal" id="contenido">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php include '../extend/scripts.php'; ?>
<script src="../js/validaciones.js"></script>
<script type="text/javascript">
$('#cargar').click(function(){
  var esperar= 2000;
  $.ajax({
url:"modal.php",
beforeSend: function(){
$('#contenido').text('cargando...');
},
success:function(data){
setTimeout(function(){
  $('#contenido').html(data);
},esperar
);
}
  });
});
</script>
</body>
</html>