<?php
    include '../conexion/conexion.php';
    include '../extend/permiso.php';

    $id = $con->real_escape_string(htmlentities($_GET['id']));
    $del = $con->query("DELETE FROM clientes WHERE id='$id'");

    if($del){
        header('location:../extend/alerta.php?msj=Usuario Eliminado&c=cli&p=incli&t=success');
    }else{
        header('location:../extend/alerta.php?msj=Usuario no Eliminado&c=cli&p=incli&t=error');
    }

    $con -> close();
?>