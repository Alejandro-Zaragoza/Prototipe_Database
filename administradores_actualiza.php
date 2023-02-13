<?php
require "funciones/conecta.php";
$con = conecta();


$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$rol = $_REQUEST['rol'];


$query = "UPDATE administradores SET nombre='$nombre', apellidos='$apellidos', correo='$correo', rol=$rol";

if ( $_FILES['archivo']['name'] != "" ) {
    $archivo_n = $_FILES['archivo']['name'];
    $archivo = $_FILES['archivo']['tmp_name'];

    
    $cadena = explode(".", $archivo_n);
    $ext = $cadena[1];                         
    $dir = "./imagenes/";                         
    $archivo_enc = md5_file($archivo);
    $archivo_n1 = "$archivo_enc.$ext";
    copy($archivo, $dir.$archivo_n1);

   
    $query = "UPDATE administradores SET archivo='$archivo_n1', archivo_n='$archivo_n' ";
}


if ( $_REQUEST['pass'] != "" ){
    $passEnc = md5( $_REQUEST['pass'] );
    $query = $query.", pass='$passEnc'";
}


$query = $query." WHERE id = $id";

$res = $con->query($query);

header("Location: administradores_lista.php");
?>