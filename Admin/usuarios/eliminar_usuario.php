<?php
    include '../conexion/conexion.php';
    include '../extend/permiso.php';

    $id = $con->real_escape_string(htmlentities($_GET['id']));
    $del = $con->query("DELETE FROM usuarios WHERE id='$id'");

    if($del){
        header('location:../extend/alerta.php?msj=Usuario Eliminado&c=us&p=in1&t=success');
    }else{
        header('location:../extend/alerta.php?msj=Usuario no Eliminado&c=us&p=in1&t=error');
    }

    $con -> close();
?>