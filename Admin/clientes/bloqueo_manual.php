<?php
    include '../conexion/conexion.php';
    $id = $con->real_escape_string(htmlentities($_GET['us']));
    $bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));

    if($bloqueo == 1){
        $up = $con->query("UPDATE clientes SET estatus=0 WHERE id='$id'");
        if($up){
            header('location:../extend/alerta.php?msj=El usuario ha sido bloqueado&c=cli&p=incli&t=success');
        }else{
            header('location:../extend/alerta.php?msj=El usuario no ha sido bloqueado&c=cli&p=incli&t=error');
        }
    }else{
        $up = $con->query("UPDATE clientes SET estatus=1 WHERE id='$id'");
        if($up){
            header('location:../extend/alerta.php?msj=El usuario ha sido desbloqueado&c=cli&p=incli&t=success');
        }else{
            header('location:../extend/alerta.php?msj=El usuario no ha sido desbloqueado&c=cli&p=incli&t=error');
        }
    }
?>