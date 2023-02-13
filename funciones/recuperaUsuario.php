<?php
require "conecta.php";
$con = conecta();

function recuperarUsuario( $id ) {
    global $con;

    $query = "SELECT * FROM administradores WHERE id=$id";        
    $res = $con->query( $query );
    $row = $res->fetch_array();

    return $row;
}

?>