<?php
    require "../funciones/conecta.php";
    $con = conecta();

    $nombre_b = $_REQUEST["nombre_b"];
    
    $buscarnombre = "SELECT * from banners WHERE nombre_b = '$nombre_b' AND id != '$id";
    $resultado = $con->query($buscarnombre);

    $contador = mysqli_num_rows($resultado);

    if($contador == 0) {
       echo 0;
       
    } else {
       echo 1;
       
    }
?>