<?php
require "../funciones/conecta.php";
$con = conecta();

$nombre_p = $_REQUEST['nombre_p'];
$codigo = $_REQUEST['codigo'];
$costo = $_REQUEST['costo'];
$stock = $_REQUEST['stock'];
$descripcion = $_REQUEST['descripcion'];

$archivo_n_p =  $_FILES["archivo_p"]["name"];
$archivo_p = $_FILES["archivo_p"]["tmp_name"];
$cadena = explode(".", $archivo_n_p);          
$ext = $cadena[1];                           
$dir = "../imagenes/";                         
$archivo_enc = md5_file($archivo_p);           

if( $archivo_n_p != '' ){
        $archivo_n1 = "$archivo_enc.$ext";
        copy($archivo_p, $dir.$archivo_n1);    
    }

    $sql = "INSERT INTO productos
    (nombre_p, codigo, costo, stock, descripcion, archivo_n_p, archivo_p)
    VALUES('$nombre_p', '$codigo', '$costo', '$stock', '$descripcion', 
    '$archivo_n_p', '$archivo_n1')";

$res = $con->query($sql);

header("Location: productos_lista.php");
?>