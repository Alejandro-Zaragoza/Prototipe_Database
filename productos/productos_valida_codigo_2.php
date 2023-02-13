<?php
    require "../funciones/conecta.php";
    $con = conecta();

    $codigo = $_REQUEST["codigo"];
    
    $buscarcodigo = "SELECT * from productos WHERE codigo = '$codigo' ";
    $resultado = $con->query($buscarcodigo);

    $contador = mysqli_num_rows($resultado);

    if($contador == 0) {
       echo 0;
       
    } else {
       echo 1;
       
    }
?>