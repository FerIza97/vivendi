<?php
    include '../conexion/conexion.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $estado = htmlentities($_POST['estado']);
        $id_cliente = htmlentities($_POST['id_cliente']);
        $municipio = htmlentities($_POST['municipio']);
        $nombre_cliente = htmlentities($_POST['nombre_cliente']);
        $precio = htmlentities($_POST['precio']);
        $fraccionamiento = htmlentities($_POST['fraccionamiento']);
        $calle_num = htmlentities($_POST['calle_num']);
        $numero_int = htmlentities($_POST['numero_int']);
        $m2t = htmlentities($_POST['m2t']); 
        $banos = htmlentities($_POST['banos']);
        $plantas = htmlentities($_POST['plantas']);
        $caracteristicas = htmlentities($_POST['caracteristicas']);
        $m2c = htmlentities($_POST['m2c']);
        $recamaras = htmlentities($_POST['recamaras']);
        $cocheras = htmlentities($_POST['cocheras']);
        $observaciones = htmlentities($_POST['observaciones']);
        $forma_pago = htmlentities($_POST['forma_pago']);
        $asesor = htmlentities($_POST['asesor']);
        $tipo_inmueble = htmlentities($_POST['tipo_inmueble']);
        $fecha_registro = htmlentities($_POST['fecha_registro']);
        $comentario_web = htmlentities($_POST['comentario_web']);
        $operacion = htmlentities($_POST['operacion']);

        $sel = $con->prepare("SELECT estado FROM estados WHERE idestados=?");
        $sel->bind_param('i',$estado);
        $sel->execute();
        $res = $sel->get_result();
        if($f=$res->fetch_assoc()){
            $nombre_estado = $f['estado'];
        }

        $id =sha1(rand(00000,99999));
        $consecutivo = '';
        $foto_principal = '';
        $mapa = $calle_num." ".$fraccionamiento." ".$nombre_estado.", ".$municipio;
        $marcado='';
        $estatus='ACTIVO';

        $ins = $con->prepare("INSERT INTO inventario VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
        $ins->bind_param("siisssdssiiiisiiisssssssssss", $id,$consecutivo,$id_cliente,$nombre_estado,$municipio,$nombre_cliente,$precio,$fraccionamiento,$calle_num,$numero_int,$m2t,$banos,$plantas,$caracteristicas,$m2c,$recamaras,$cocheras,$observaciones,$forma_pago,$asesor,$tipo_inmueble,$fecha_registro,$comentario_web,$operacion,$foto_principal,$mapa,$marcado,$estatus);

        if($ins->execute()){
            header('location:../extend/alerta.php?msj=Propiedad guardada&c=cli&p=in&t=success');
        }else{
            header('location:../extend/alerta.php?msj=Propiedad no guardada&c=cli&p=in&t=error');
        }

        $ins->close();
        $con->close();
    }else{
        header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
    }
?>