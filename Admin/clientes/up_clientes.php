<?php
    include '../conexion/conexion.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
        $apellidos = $con->real_escape_string(htmlentities($_POST['apellidos']));
        $direccion = $con->real_escape_string(htmlentities($_POST['direccion']));
        $telefono = $con->real_escape_string(htmlentities($_POST['telefono']));
        $correo = $con->real_escape_string(htmlentities($_POST['correo']));
        $id = $con->real_escape_string(htmlentities($_POST['id']));

        $up = $con->query("UPDATE clientes SET nombre='$nombre', apellidos='$apellidos', dirreccion='$direccion', tel='$telefono', correo='$correo' WHERE id='$id'");
        if($up){
            header('location:../extend/alerta.php?msj=Cliente actualizado&c=cli&p=incli&t=success');
        }else{
            header('location:../extend/alerta.php?msj=Cliente no actualizado&c=cli&p=incli&t=error');
        }

        $con -> close();
    }else{
        header('location:../extend/alerta.php?msj= Utiliza el formulario&c=us&p=in&t=error');
    }
?>