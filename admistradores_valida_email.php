<?php
    require "funciones/conecta.php";
    $con = conecta();

    $correo = $_POST["correo"];
    $id = $_POST["id"];

    $buscarCorreo = "SELECT * from administradores WHERE correo = '$correo' AND id != $id";
    $resultado = $con->query($buscarCorreo);

    $contador = mysqli_num_rows($resultado);

    if($contador == 0) {
       echo 0;
    } else {
       echo 1;
    }
?>