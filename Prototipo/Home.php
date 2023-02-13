<!DOCTYPE html>
<html lang="es">
<head>
    <title>Presentación</title>
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

    <!-- /////////////////////////////////////////////////////////////////// -->
    <script src="../js/jquery-3.3.1.min.js"></script>                                                       


</head>
<header>
        <?php
            require_once('dashboard.php');
        ?>
</header>

<body align="center"><br>

<?php
$sql= "SELECT * FROM banners WHERE status = 1 AND eliminado = 0 ORDER BY RAND() LIMIT 1";
$res_banner = $con->query($sql);

while($row = $res_banner->fetch_array()){
    $archivo = $row['archivo_b'];

echo "<div class=\"presenta_banner\"><br>";
echo "<img class=\"banner\" src=\"../imagenes/$archivo\"/>
<br><br><br>";

echo "</div>";
}
?>

<?php

$sql = "SELECT * FROM productos
        WHERE status = 1 AND eliminado = 0 ORDER BY RAND() LIMIT 6";
$res = $con->query($sql);



echo "<div class=\"muestra\"><br>";

/*BOTONERA INICIO*/ 
echo "<div class=\"botonera_inicio\">";
    echo "<img id=\"personaje\" class=\"personaje\"src=\"../imagenes/Personaje_1.png\"/>";
        echo "<div class=\"producto\"><h1 class=\"neon\">PRODUCTOS </h1></div>";
    echo "<img id=\"personaje\" class=\"personaje_1\"src=\"../imagenes/Personaje_2.png\"/>";
echo "</div>";

echo "<p>______________________________________________________________________________________________________________</p><br>";


while($row = $res->fetch_array()) {

    $id = $row["id"];
    $nombre_p = $row["nombre_p"];
    $codigo = $row["codigo"];
    $descripcion = $row["descripcion"];
    $costo = $row["costo"];
    $stock = $row["stock"];
    $archivo_p = $row["archivo_p"];
    
    echo "<div class=\"producto_m\">";
        echo "<p id='$id'>Nombre: $nombre_p |  Costo: $$costo |<br>  Disponibles:$stock  <br><br>
                Descripción:$descripcion<br> <img class=\"producto_imagen\" 
                src=\"../imagenes/$archivo_p\"/></p><br>";
    echo "</div>";
    echo "<br>";

}
    echo "<img id=\"personaje\" class=\"personaje_2\"src=\"../imagenes/Personajes_guia.png\"/>";
    echo "<img id=\"personaje\" class=\"personaje_3\"src=\"../imagenes/Personajes_guia.png\"/>";
    echo "<img id=\"personaje\" class=\"personaje_3\"src=\"../imagenes/Swat.gif\"/>";
    echo "<br><br><br>";
echo "</div>";
?>

</body>
<footer>
        <?php
            require_once('footer.php');
        ?>
</footer>
</html>
