<?php
//CONDICIONAL PARA REDIRECCIONAR SI NO EXISTE LA SESION
session_start();
if ( empty( $_SESSION['nombre'] ) ) {
    header( 'location: index.php' );
}
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <title>Detalles</title>
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

    <!-- /////////////////////////////////////////////////////////////////// -->
    <script src="../js/jquery-3.3.1.min.js"></script>                                                       

</head>

<body align="center">
<?php
require "../funciones/conecta.php";
$con = conecta();
$id1 = $_GET['id'];

$sql = "SELECT * FROM banners WHERE id = $id1 AND eliminado = 0";
$res = $con->query($sql);

echo "<h1 class=\"neon\"align=\"center\">Detalles de Banner</h1>";
echo "<div class=\"muestra\"><br>";
    echo "<div class=\"texto_detalles\"><br>";
    while($row = $res->fetch_array()) {

        $id = $row["id"];
        $nombre_b = $row["nombre_b"];
        $archivo_b = $row["archivo_b"];

        echo "<p>ID: $id <br><br>Nombre: $nombre_b  <br><br>";
        
    }
    echo "</div>";

    echo "<div class=\"imagen_detalles\">";
        echo"<p class=\"alta_1\">Banner: </p>";
        echo "<img class=\"banner_imagen\" src=\"../imagenes/$archivo_b\"/>";
    echo "</div><br>";

    echo "<div>";
    echo "<div class=\"regresa\"><a class=\"alta_1\" href=\"banners_lista.php\">Regresar al listado...</a></div>";
    echo "<img id=\"personaje\" class=\"personaje_3\"src=\"../imagenes/Zombi_corriendo.gif\" />";
    echo "</div>";
echo "</div>";
    ?>

</body>
</html>