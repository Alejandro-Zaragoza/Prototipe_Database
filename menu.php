<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">


<?php
//CONDICIONAL PARA REDIRECCIONAR SI NO EXISTE LA SESION
session_start();
if ( empty( $_SESSION['nombre'] ) ) {
    header( 'location: index.php' );
}

$nombre = $_SESSION['nombre'];
?>

<div>
    
    <table class="menu">
        <tr height="20">
            <td class="seccion"><a class="link" href="bienvenido.php">           Inicio</a></td>
            <td class="seccion"><a class="link" href="administradores_lista.php">Administradores</a></td>
            <td class="seccion"><a class="link" href="productos/productos_lista.php">      Productos</a></td>
            <td class="seccion"><a class="link" href="banners/banners_lista.php" >       Banners</a></td>
            <td class="seccion"><a class="link" href="pedidos_lista.php" >       Pedidos</a></td>
            <td class="seccion"><a class="link">Bienvenido! <?php echo $nombre;?></a><br><br></td>
            <td class="seccion"><a class="link" href="salir.php">                Cerrar sesion</a></td>
        </tr>
    </table>
</div>