<?php
session_start();
require "conecta.php";
$con = conecta();

$user = $_POST['user'];
$pass = $_POST['pass'];
$passEnc = md5($pass);

$sql = "SELECT * FROM administradores WHERE correo = '$user' AND pass = '$passEnc' 
        AND status = 1 AND eliminado = 0";
    
$res = $con->query($sql);
$num = mysqli_num_rows($res);

if( $num ){
    $row = $res->fetch_array();
    $idU = $row["id"];
    $nombre = $row["nombre"].' '.$row["apellidos"];
    $correo = $row["correo"];
    
    $_SESSION['idU'] = $idU;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['correo'] = $correo;
}
echo $num;
?>