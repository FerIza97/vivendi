<?php
    include '../conexion/conexion.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $user = $con->real_escape_string(htmlentities($_POST['usuario']));
        $pass = $con->real_escape_string(htmlentities($_POST['pass']));
        $candado= ' ';
        $str_u = strpos($user,$candado);
        $str_p = strpos($pass,$candado);
        
        if(is_int($str_u)){
            $user = '';
        }else{
            $usuario = $user;
        }

        if(is_int($str_p)){
            $pass = '';
        }else{
            $pass1 = hash('sha512',$pass);
        }

        if($user == null && $pass == null){
            header('location:../extend/alerta.php?msj=Los campos estan vacios&c=salir&p=salir&t=error');
            exit;
        }else{
            $sel = $con->query("SELECT nick,nombre,nivel,correo,pass,foto,apellidos FROM usuarios WHERE nick = '$usuario' AND pass = '$pass1' AND estatus = 1");
            $row = mysqli_num_rows($sel);

            if($row == 1){
                if($var = $sel->fetch_assoc()){
                    $nick = $var['nick'];
                    $nombre = $var['nombre'];
                    $ape = $var['apellidos'];
                    $nivel = $var['nivel'];
                    $correo = $var['correo'];
                    $pass2 = $var['pass'];
                    $foto = $var['foto'];
                }

                if($nick == $usuario && $pass2 == $pass1 && $nivel == 'Administrador'){
                    $_SESSION['nick'] = $nick;
                    $_SESSION['nombre'] = $nombre;
                    $_SESSION['apellidos'] = $ape;
                    $_SESSION['nivel'] = $nivel;
                    $_SESSION['correo'] = $correo;
                    $_SESSION['foto'] = $foto;
                    header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
                    exit;
                }else if($nick == $usuario && $pass2 == $pass1 && $nivel == 'Asesor'){
                    $_SESSION['nick'] = $nick;
                    $_SESSION['nombre'] = $nombre;
                    $_SESSION['apellidos'] = $ape;
                    $_SESSION['nivel'] = $nivel;
                    $_SESSION['correo'] = $correo;
                    $_SESSION['foto'] = $foto;
                    header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
                    exit;
                }else{
                    header('location:../extend/alerta.php?msj=Error de permisos&c=salir&p=salir&t=error');
                    exit;
                }
            }else{
                header('location:../extend/alerta.php?msj=Nombre de usuraio o contraseña incorrectos&c=salir&p=salir&t=error');
                exit;
            }
        }
        $con->close();
    }else{
        header('location:..extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
    }
?>