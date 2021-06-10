<?php
    include '../conexion/conexion.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = htmlentities($_POST['nombre']);
        $apellidos = htmlentities($_POST['apellidos']);
        $direccion = htmlentities($_POST['direccion']);
        $telefono = htmlentities($_POST['telefono']);
        $correo = htmlentities($_POST['correo']);
        $asesor = $_SESSION['nombre'];
        $estatus = 1;
        $foto = htmlentities($_POST['foto']);
        $pass = htmlentities($_POST['pass1']);
        $pass = hash('sha512',$pass);
        $id = '';

        $ins = $con->prepare("INSERT INTO clientes VALUES (?,?,?,?,?,?,?,?,?,?)");
        $ins->bind_param("isssssisss",$id, $nombre, $apellidos, $direccion, $telefono, $correo, $estatus, $asesor, $pass, $foto);
    
        if($ins->execute()){
            header('location:../extend/alerta.php?msj=Cliente registrado&c=cli&p=in&t=success');
            exit;
        }else{
            header('location:../extend/alerta.php?msj=El cliente no se pudo registrar&c=cli&p=in&t=success');
            exit;
        }

    $ins->close();
    $con->close();
    }else{
        header('location:../extend/alerta.php?msj=El usuario ha sido registrado&c=us&p=in&t=success');
            exit;
    }
?>