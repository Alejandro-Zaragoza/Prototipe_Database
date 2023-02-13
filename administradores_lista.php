
<!DOCTYPE html>
<html lang="es">
<head>
    <title>B3</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

    <!-- /////////////////////////////////////////////////////////////////// -->
    <script src="js/jquery-3.3.1.min.js"></script>                                                       

        <!-- script eliminar administrador -->
        <script>
        function eliminar(ida){
            var id= ida;

            if( confirm("Desea eliminar al usuario?") == true ){
                $.ajax({
                    url : 'administradores_elimina.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'id='+id,

                    success : function(){
                        alert('Datos actualizados!');
                        $( "."+id ).hide();
                        
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
            require_once('menu.php');
        ?>
</header>
<body align="center">
<?php

require "funciones/conecta.php";

$con = conecta();
$sql = "SELECT * FROM administradores
        WHERE status = 1 AND eliminado = 0";
$res = $con->query($sql);

echo "<h1 class=\"neon\">LISTADO DE ADMINISTRADORES </h1><br><br>";

echo "<div class=\"muestra\"><br>";

/*BOTONERA INICIO*/ 
echo "<div class=\"botonera_inicio\">";
    echo "<img id=\"personaje\" class=\"personaje\"src=\"imagenes/Personaje_1.png\"/>";
        echo "<div class=\"agrega\"><a class=\"alta\" href=\"administradores_alta.php\">Crear nuevo registro</a></div>";
    echo "<img id=\"personaje\" class=\"personaje_1\"src=\"imagenes/Personaje_2.png\"/>";
echo "</div>";

echo "<p>______________________________________________________________________________________________________________</p><br>";


while($row = $res->fetch_array()) {

    $id = $row["id"];
    $nombre = $row["nombre"];
    $apellidos = $row["apellidos"];
    $correo = $row["correo"];
    $rol = $row["rol"];
    $archivo = $row["archivo"];
    
    if($rol == 1){
        echo "<p class='$id'>$id |  $nombre $apellidos |  $correo |  Gerente|  <br>
        <img class=\"producto_imagen\" src=\"imagenes/$archivo\"/></p><br>";
        echo "<div class=\"botonera\">";
            echo "<button class=\"eliminar\" onclick=\"eliminar($id)\">Eliminar</button> ";
            echo "<div class=\"detalle\"><a class=\"alta\" href=\"administradores_detalles.php?id=$id\">Ver Detalles</a></div>";
            echo "<div class=\"detalle\"><a class=\"alta\" href=\"administradores_editar.php?id=$id\">Editar</a></div><br>";
        echo "</div>";
        echo "<p class='$id'>______________________________________________________________________________________________________________</p>";
    }

    if($rol == 2){
        echo "<p class='$id'>$id |  $nombre $apellidos |  $correo |  Ejecutivo|  <br>
        <img class=\"producto_imagen\" src=\"imagenes/$archivo\"/></p></p><br>";
        echo "<div class=\"botonera\">";
            echo "<button class=\"eliminar\" onclick=\"eliminar($id)\">Eliminar</button> ";
            echo "<div class=\"detalle\"><a class=\"alta\" href=\"administradores_detalles.php?id=$id\">Ver Detalle</a></div>";
            echo "<div class=\"detalle\"><a class=\"alta\" href=\"administradores_editar.php?id=$id\">Editar</a></div><br>";
        echo "</div>";
        echo "<p class='$id'>______________________________________________________________________________________________________________</p>";
    }
    echo "<br>";

}
    echo "<img id=\"personaje\" class=\"personaje_2\"src=\"imagenes/Personajes_guia.png\"/>";
    echo "<img id=\"personaje\" class=\"personaje_3\"src=\"imagenes/Personajes_guia.png\"/>";
    echo "<img id=\"personaje\" class=\"personaje_3\"src=\"imagenes/Swat.gif\"/>";
    echo "<br><br><br>";
echo "</div>";
?>

</body>
</html>
