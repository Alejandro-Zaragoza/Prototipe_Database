<?php
require "../funciones/conecta.php";
$con = conecta();

$id= $_REQUEST['id'];
$nombre_p = $_REQUEST['nombre_p'];
$codigo = $_REQUEST['codigo'];
$costo = $_REQUEST['costo'];
$stock = $_REQUEST['stock'];
$descripcion = $_REQUEST['descripcion'];


$query = "UPDATE productos SET nombre_p='$nombre_p', codigo='$codigo', costo='$costo', stock='$stock',
         descripcion='$descripcion' ";


if ( $_FILES['archivo_p']['name'] != "" ) {
    $archivo_n_p = $_FILES['archivo_p']['name'];
    $archivo_p = $_FILES['archivo_p']['tmp_name'];

    
    $cadena = explode(".", $archivo_n_p);
    $ext = $cadena[1];                         
    $dir = "../imagenes/";                         
    $archivo_enc = md5_file($archivo_p);
    $archivo_n1 = "$archivo_enc.$ext";
    copy($archivo_p, $dir.$archivo_n1);

   
    $query = $query.", archivo_p='$archivo_n1', archivo_n_p='$archivo_n_p' ";
}

$query = $query." WHERE id =$id";
$res = $con->query($query);

header("Location: productos_lista.php");
?>