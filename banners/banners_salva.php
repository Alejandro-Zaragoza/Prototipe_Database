<?php
require "../funciones/conecta.php";
$con = conecta();

$nombre_b = $_REQUEST['nombre_b'];

$archivo_n_b =  $_FILES["archivo_b"]["name"];
$archivo_b = $_FILES["archivo_b"]["tmp_name"];
$cadena = explode(".", $archivo_n_b);          
$ext = $cadena[1];                           
$dir = "../imagenes/";                         
$archivo_enc = md5_file($archivo_b);           

if( $archivo_n_b != '' ){
        $archivo_n1 = "$archivo_enc.$ext";
        copy($archivo_b, $dir.$archivo_n1);    
    }

    $sql = "INSERT INTO banners
    (nombre_b, archivo_n_b, archivo_b)
    VALUES('$nombre_b','$archivo_n_b', '$archivo_n1')";

$res = $con->query($sql);

header("Location: banners_lista.php");
?>