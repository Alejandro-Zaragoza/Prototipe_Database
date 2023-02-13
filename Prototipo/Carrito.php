<!DOCTYPE html>
<html lang="es">
<head>
    <title>Carrito</title>
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
<div class="muestra"><br>
    <div>
    <h1 class="neon">Tu carrito de compras</h1>

    <p class="carrito">Producto id: </p><p class="carrito">Cantidad: </p><p class="carrito">Costo: </p><br>
    <?php
    $total=0;
    $sql = "SELECT * FROM pedidos_productos";
    $res = $con->query($sql);
    while($row = $res->fetch_array()) {

        $id_producto = $row["id_producto"];
        $precio = $row["precio"];
        $cantidad = $row["cantidad"];
        $total=$total + $precio;

        echo "<p class=\"carrito_muestra\">$id_producto </p>   
        <p class=\"carrito_muestra\">$cantidad </p> 
        <p class=\"carrito_muestra\">$$precio </p> ";

        

    }
    echo "<p>______________________________________________________________________________________________________________</p>";
    echo "<br>";
    ?>

    <p class="total">Monto total de compra: $<?php echo $total;?></p><br><br><br>
    <button class="btn" >Finalizar compra</button><br><br>

    <div class="regresa"><a class="alta_1" href="Productos.php">Seguir comprando...</a></div>
    <img id="personaje" class="personaje_3"src="../imagenes/Zombi_corriendo.gif"/>
    </div>
</div>

</body>
<footer>
        <?php
            require_once('footer.php');
        ?>
</footer>
</html>
