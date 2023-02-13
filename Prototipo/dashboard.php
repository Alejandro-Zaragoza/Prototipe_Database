<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">


<?php
//CONDICIONAL PARA REDIRECCIONAR SI NO EXISTE LA SESION
session_start();
if ( empty( $_SESSION['nombre'] ) ) {
    header( 'location: ../index.php' );
}

$nombre = $_SESSION['nombre'];
$idU = $_SESSION['idU'];
?>

<div>
    
    <table class="dashboard">
        <tr height="20">
            <td class="seccion"><a class="link" href="Home.php">        Home</a></td>
            <td class="seccion"><a class="link" href="Productos.php">   Productos</a></td>
            <td class="seccion"><a class="link" href="Contacto.php">    Contacto</a></td>
            <td class="seccion"><a class="link" href="Carrito.php" >    Carrito</a></td>
            <td class="seccion"><a class="link" >
                <?php 
                require "../funciones/conecta.php";
                $con = conecta();
                
                
                $sql = "SELECT * FROM administradores WHERE id = $idU AND eliminado = 0";
                $res = $con->query($sql);
                while($row = $res->fetch_array()) {
                    $archivo = $row["archivo"];
                    echo "<img class=\"dashboard_imagen\" src=\"../imagenes/$archivo\"/><br>
                    $nombre";
                }
                ?>
            </a></td>
            <td class="seccion"><a class="link" href="../salir.php">    Cerrar sesion</a></td>
        </tr>
    </table>
</div>