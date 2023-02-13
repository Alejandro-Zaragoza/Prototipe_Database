<?php
require "funciones/conecta.php";
$con = conecta();

$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$rol = $_REQUEST['rol'];

$archivo_n =  $_FILES["archivo"]["name"];
$archivo = $_FILES["archivo"]["tmp_name"];
$cadena = explode(".", $archivo_n);          
$ext = $cadena[1];                           
$dir = "./imagenes/";                         
$archivo_enc = md5_file($archivo);           

$passEnc = md5($pass); 

if( $archivo_n != '' ){
        $archivo_n1 = "$archivo_enc.$ext";
        copy($archivo, $dir.$archivo_n1);    
    }

    $sql = "INSERT INTO administradores
    (nombre, apellidos, correo, pass, rol, archivo_n, archivo)
    VALUES('$nombre', '$apellidos', '$correo', '$passEnc', $rol, 
    '$archivo_n', '$archivo_n1')";
$res = $con->query($sql);

header("Location: administradores_lista.php");
?>