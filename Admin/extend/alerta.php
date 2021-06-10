<?php
    include '../conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
    <title>Document</title>
</head>
<body>
<?php
    $mensaje = htmlentities($_GET['msj']);
    $c = htmlentities($_GET['c']);
    $p = htmlentities($_GET['p']);
    $t = htmlentities($_GET['t']);

    switch($c){
        case 'us':
            $carpeta = '../usuarios/';
            break;
        case 'home':
            $carpeta = '../inicio/';
            break;
        case 'salir':
            $carpeta = '../';
            break;
        case 'pe':
            $carpeta = '../perfil/';
            break;
        case 'cli':
            $carpeta = '../clientes/';
            break;
        case 'prp':
            $carpeta = '../inmuebles/';
            break;
    }

    switch($p){
        case 'in':
            $pagina = 'index.php';
            break;
        case 'in1':
            $pagina = 'lis_usuarios.php';
            break;
        case 'home':
            $pagina = 'index.php';
            break;
        case 'salir':
            $pagina = 'index.php';
            break;
        case 'perfil':
            $pagina = 'index.php';
            break;
        case 'incli':
            $pagina = 'lis_cliente.php';
            break;
    }

    $dir = $carpeta.$pagina;

    if($t == "error"){
        $titulo = "Opsss..";
    }else{
        $titulo = "Buen trabajo";
    }
?>


    <!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
swal({
  title: '<?php echo $titulo ?>',
  text: "<?php echo $mensaje ?>",
  type: '<?php echo $t ?>',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'Ok'
}).then(function(){
    location.href='<?php echo $dir ?>';
});

$(document).click(function() {
    location.href='<?php echo $dir ?>';
});

$(document).keyup(function(e){
    if(e.which == 27){
        location.href='<?php echo $dir ?>'
    }
});

</script>
</body>
</html>