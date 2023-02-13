<!DOCTYPE html>
<html lang="es">
<head>
    <title>Productos</title>
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
<body align="center">
<?php

$sql = "SELECT * FROM productos
        WHERE status = 1 AND eliminado = 0";
$res = $con->query($sql);

echo "<h1 class=\"neon\">Adquiere tu favorito! </h1><br><br>";

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
    
        echo "<p id='$id' class=\"producto_m\">$id |  Nombre: $nombre_p |  código: $codigo |  Costo: $$costo |  Stock: $stock  <br>
                $descripcion<br> <img class=\"producto_imagen\" 
                src=\"../imagenes/$archivo_p\"/><br><br><br>
                
                <div class=\"botonera_1\">
                    <div id='$id' class=\"compra\"><a class=\"alta\" href=\"Detalles.php?id=$id\">Ver Detalles</a></div>
                    <div id='$id' class=\"compra_1\"><a class=\"alta\" href=\"Carrito_agrega.php?id=$id\">Carrito</a></div><br>
                </div>
            </p><br>";
                

        echo "<p>______________________________________________________________________________________________________________</p>";
    echo "<br>";

}
?>
<img id="personaje" class="personaje_5"src="../imagenes/Disparo.gif"/>
    <img id="personaje" class="personaje_3"src="../imagenes/Zombi_fuego.gif"/>
    <img id="personaje" class="personaje_3"src="../imagenes/Zombi_fuego.gif"/>
<br><br><br>
</div>


</body>
</html>
