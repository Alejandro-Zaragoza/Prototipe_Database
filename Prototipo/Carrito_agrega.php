<?php
require "../funciones/conecta.php";
$con = conecta();
$id = $_GET['id'];

$sql = "SELECT * FROM productos WHERE id = $id AND eliminado = 0";
$res = $con->query($sql);

    while($row = $res->fetch_array()) {

        $id_p = $row["id"];
        $nombre_p = $row["nombre_p"];
        $costo = $row["costo"];
    }
    
    $sql = "INSERT INTO pedidos_productos
    (id_producto, precio, cantidad)
    VALUES('$id_p', '$costo', 1)";

$res = $con->query($sql);

    header("Location: Productos.php");
    ?>
