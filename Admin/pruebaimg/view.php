<?php
include '../conexion/conexion.php';
    
    //Get image data from database
    $result = $con->query("SELECT image FROM images WHERE id = 1");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        echo 'Image not found...';
    }
?>