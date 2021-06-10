<?php
    include '../conexion/conexion.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $nick = $_POST['nick'];
        $pass1 = $_POST['pass1'];
        $nivel = $_POST['nivel'];
        $foto = $_POST['foto'];

        if(empty($nombre) || empty($apellidos) || empty($correo) || empty($nick) || empty($pass1) || empty($nivel)) {
            header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=us&p=in&t=error');
            exit;
        }
        if(!ctype_alpha($nick)){
            header('location:../extend/alerta.php?msj=El nombre de usuario no contiene solo letras&c=us&p=in&t=error');
            exit;
        }
        if(!ctype_alpha($nivel)){
            header('location:../extend/alerta.php?msj=El nivel no contiene solo letras&c=us&p=in&t=error');
            exit;
        }

        $caracteres = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
        for($i=0; $i < strlen($nombre); $i++){
            $buscar = substr($nombre,$i,1);
            if(strpos($caracteres,$buscar) === false){
                header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=us&p=in&t=error');
                exit;
            }
        }

        $caracteresap = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
        for($j=0; $j < strlen($apellidos); $j++){
            $buscarap = substr($apellidos,$j,1);
            if(strpos($caracteresap,$buscarap) === false){
                header('location:../extend/alerta.php?msj=Los apellidos no contienen solo letras&c=us&p=in&t=error');
                exit;
            }
        }

        $usuario = strlen($nick);
        if($usuario < 8 || $usuario > 15){
            header('location:../extend/alerta.php?msj=El nick debe contener entre 8 y 15 letras&c=us&p=in&t=error');
            exit;
        }

        $contra = strlen($pass1);
        if($contra < 8 && $contra > 15){
            header('location:../extend/alerta.php?msj=La contraseña debe contener entre 8 y 15 letras&c=us&p=in&t=error');
            exit;
        }

        if(!empty($correo)){
            if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
                header('location:../extend/alerta.php?msj=El correo no es valido&c=us&p=in&t=error');
                exit;
            }
        }

        $extension = '';
        $ruta = 'foto_perfil';
        $archivo=$_FILES['foto']['tmp_name'];
        $nombrearchivo = $_FILES['foto']['name'];
        $info = pathinfo($nombrearchivo);
        if($archivo != ''){
            $extension = $info['extension'];
            if($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG"){
                move_uploaded_file($archivo,'foto_perfil/'.$nick.'.'.$extension);
                $ruta = $ruta."/".$nick.'.'.$extension;
            }else{
                header('location:../extend/alerta.php?msj=El formato de la imagen no es valido&c=us&p=in&t=error');
                exit;
            }
        }else{
            $ruta = "foto_perfil/perfil.png";
        }

        $pass1 = hash('sha512',$pass1);
        $query = "INSERT INTO usuarios VALUES ('','$nick','$pass1','$nombre','$apellidos','$correo','$nivel',1,'$ruta')";
        $ins = mysqli_query($con, $query);
        if($ins){
            header('location:../extend/alerta.php?msj=El usuario ha sido registrado&c=us&p=in&t=success');
            exit;
        }else{
            header('location:../extend/alerta.php?msj=El usuario no se registro&c=us&p=in&t=error');
            exit;
        }

        $con->close();

    }else{
        header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
    }
?>