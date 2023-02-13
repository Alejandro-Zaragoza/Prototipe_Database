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
    <title>productos_lista</title>
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

    <!-- /////////////////////////////////////////////////////////////////// -->
    <script src="../js/jquery-3.3.1.min.js"></script>                                                       

        <!-- script eliminar producto -->
        <script>
        function eliminar(ida){
            var id= ida;

            if( confirm("Desea eliminar al producto?") == true ){
                $.ajax({
                    url : 'productos_elimina.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'id='+id,

                    success : function(){
                        alert('Datos actualizados!');
                        $( "#"+id ).hide();
                        
                    },error: function(){
                        alert('Error archivo no encontrado...');
                    }
                });
            }
        }
        </script>

</head>
<header>
        <?php
            require_once('menu_productos.php');
        ?>
</header>
<body align="center">
<?php

require "../funciones/conecta.php";

$con = conecta();
$sql = "SELECT * FROM productos
        WHERE status = 1 AND eliminado = 0";
$res = $con->query($sql);

echo "<h1 class=\"neon\">LISTADO DE PRODUCTOS </h1><br><br>";

echo "<div class=\"muestra\"><br>";

/*BOTONERA INICIO*/ 
echo "<div class=\"botonera_inicio\">";
    echo "<img id=\"personaje\" class=\"personaje\"src=\"../imagenes/Personaje_1.png\"/>";
        echo "<div class=\"agrega\"><a class=\"alta\" href=\"productos_alta.php\">AGREGAR NUEVO PRODUCTO</a></div>";
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
    
        echo "<p id='$id'>$id |  $nombre_p |  $codigo |  $costo |  $stock  <br>
                $descripcion<br> <img class=\"producto_imagen\" 
                src=\"../imagenes/$archivo_p\"/></p><br>";
                
        echo "<div class=\"botonera\">";
            echo "<button id='$id' class=\"eliminar\" onclick=\"eliminar($id)\">Eliminar</button> ";
            echo "<div id='$id' class=\"detalle\"><a class=\"alta\" href=\"productos_detalles.php?id=$id\">Ver Detalles</a></div>";
            echo "<div id='$id' class=\"detalle\"><a class=\"alta\" href=\"productos_editar.php?id=$id\">Editar</a></div><br>";
        echo "</div>";
        echo "<p>______________________________________________________________________________________________________________</p>";
    echo "<br>";

}
    echo "<img id=\"personaje\" class=\"personaje_2\"src=\"../imagenes/Personajes_guia.png\"/>";
    echo "<img id=\"personaje\" class=\"personaje_3\"src=\"../imagenes/Personajes_guia.png\"/>";
    echo "<img id=\"personaje\" class=\"personaje_3\"src=\"../imagenes/Swat.gif\"/>";
    echo "<br><br><br>";
echo "</div>";
?>

</body>
</html>
