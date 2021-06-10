<?php
if($_SESSION['nivel'] != 'Administrador'){
    header('location:bloqueo.php');
}
?>