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

    <link href="../style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

     <title>Alta_banners</title>

     <script src="../js/jquery-3.3.1.min.js"></script>

     <script>
          
          function recibe( e ){
               e.preventDefault();

               let nombre_b = document.forma01.nombre_b.value;
               let archivo_b = document.forma01.archivo_b.value;

               //evaluar los casos
               if(nombre_b != '' && archivo_b != '' ){
                    // si solo falta el name valido
                    document.forma01.submit();
                    }
               else {
                    $('#mensaje').html('Faltan campos por llenar');
                    setTimeout("$('#mensaje').html('');", 5000);
               }
          }
     </script>

</head>

<body align="center">
     <h1 class="neon">Agregar banner</h1>
     <div class="muestra"><br>
     <form name="forma01" action="banners_salva.php" method="POST" enctype="multipart/form-data" >
		<label>
			Nombre:
			<input  type="text" name="nombre_b" placeholder="Escribe el nombre" required>
		</label>
        <br><br>
        <label>
          Imagen: 
          <input type="file" id="archivo" name="archivo_b" ><br><br>
        </label>

        <div id="mensaje" class="error"></div><br><br>
          <input class="btn" onclick="recibe(event);" type="submit" value="Salvar"> <br>
	</form>

<div>
<div class="regresa"><a class="alta_1" href="banners_lista.php">Regresar al listado...</a></div>
<img id="personaje" class="personaje_3"src="../imagenes/Zombi_corriendo.gif"/>
<br><br><br><br>   
</body>
</html>