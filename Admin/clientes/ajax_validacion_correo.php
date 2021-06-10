<?php
    include '../conexion/conexion.php';

    $correo = $con->real_escape_string($_POST['correo']);
    
    $sel = $con->query("SELECT id FROM clientes WHERE correo = '$correo'");
    $row = mysqli_num_rows($sel);

    $sel1 = $con->query("SELECT id FROM usuarios WHERE correo = '$correo'");
    $row1 = mysqli_num_rows($sel1);

    if($row1 != 0){
        echo "<label style='color: red;'>El correo ingresado ya existe</label>";
    }else{
        if($row != 0){
            echo "<label style='color: red;'>El correo ingresado ya existe</label>";
        }else{
            echo "<label style='color: green;'>El correo ingresado esta disponible</label>";
        }
    }

    $con->close();
?>