<?php
    include '../conexion/conexion.php';
    include '../extend/permiso.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $con->real_escape_string(htmlentities($_POST['id']));
        $nivel = $con->real_escape_string(htmlentities($_POST['nivel']));
        $up = $con->query("UPDATE usuarios SET nivel='$nivel' WHERE id='$id' ");
        if($up){
            header('location:../extend/alerta.php?msj= Nivel actualizado&c=us&p=in1&t=success');
        }else{
            header('location:../extend/alerta.php?msj= Nivel no actualizado&c=us&p=in1&t=error');
        }
    }else{
        header('location:../extend/alerta.php?msj= Utiliza el formulario&c=us&p=in&t=error');
    }
    $con -> close();
?>