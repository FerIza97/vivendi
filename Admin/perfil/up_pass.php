<?php
    include '../conexion/conexion.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nick = $_SESSION['nick'];
        $pass = $con->real_escape_string(htmlentities($_POST['pass1']));
        $pass = hash('sha512',$pass);
        $up = $con->query("UPDATE usuarios SET pass='$pass' WHERE nick='$nick'");

        if($up){
            header('location:../extend/alerta.php?msj=Contraseña actualizada&c=pe&p=perfil&t=success');
        }else{
            header('location:../extend/alerta.php?msj=Contraseña no actualizada&c=pe&p=perfil&t=error');
        }

        $con->close();
    }else{
        header('locaton:../extend/alerta.php?msj=Datos actualizados&c=pe&p=perfil&t=success');
    }
?>