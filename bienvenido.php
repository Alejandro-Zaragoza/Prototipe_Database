<!DOCTYPE html>
<html lang="es">
<head>
    <title>Bienvenida</title>

    <link href="style.css" rel="stylesheet" type="text/css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

    <script src="js/jquery-3.3.1.min.js"></script>
</head>
<header>
        <?php
            require_once('menu.php');
        ?>
</header>
<body align="center">
    
    <br><br>
    
    <div class="muestra">
        <br><br>
        <h1 class="neon">Bienvenido! <?php echo $_SESSION['nombre'];?></h1>

        <img id="personaje" class="personaje_5"src="imagenes/Disparo.gif"/>
        <img id="personaje" class="personaje_3"src="imagenes/Zombi_fuego.gif"/>
    </div>
</body>
</html>
