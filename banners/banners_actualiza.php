<?php
require "../funciones/conecta.php";
$con = conecta();

$id= $_REQUEST['id'];
$nombre_b = $_REQUEST['nombre_b'];

$query = "UPDATE banners SET nombre_b='$nombre_b' ";


if ( $_FILES['archivo_b']['name'] != "" ) {
    $archivo_n_b = $_FILES['archivo_b']['name'];
    $archivo_b = $_FILES['archivo_b']['tmp_name'];

    
    $cadena = explode(".", $archivo_n_b);
    $ext = $cadena[1];                         
    $dir = "../imagenes/";                         
    $archivo_enc = md5_file($archivo_b);
    $archivo_n1 = "$archivo_enc.$ext";
    copy($archivo_b, $dir.$archivo_n1);

   
    $query = $query.", archivo_b='$archivo_n1', archivo_n_b='$archivo_n_b' ";
}

$query = $query." WHERE id =$id";
$res = $con->query($query);

header("Location: banners_lista.php");
?>