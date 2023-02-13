<?php
    require "../funciones/conecta.php";
    $con = conecta();

    $codigo = $_REQUEST["codigo"];
    $id = $_REQUEST["id"];
    
    $buscarcodigo = "SELECT * from productos WHERE codigo = '$codigo' AND id != $id";
    $resultado = $con->query($buscarcodigo);

    $contador = mysqli_num_rows($resultado);

    if($contador == 0) {
       echo 0;
       
    } else {
       echo 1;
       
    }
?>