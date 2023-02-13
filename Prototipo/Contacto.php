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

     <title>Contacto</title>

     <script src="../js/jquery-3.3.1.min.js"></script>

     <script>
          function recibe( e ){
               e.preventDefault();
               let nombre = document.forma01.nombre.value;
               let correo = document.forma01.correo.value;
               let asunto = document.forma01.asunto.value;
               
               //evaluar los casos
               if(nombre != '' && correo != '' &&  asunto != ''){
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
     <h1 class="neon">Contacta con nosotros</h1>
     <div class="muestra"><br>
     <form name="forma01" method="POST" action="envia_correo.php">
		
     <label>
			Nombre completo:
			<input id="campo1" type="text" name="nombre" placeholder="Escribe tu nombre" required>
		</label>
          <br><br><br>

		<label>
			correo:
			<input id="campo2" type="text" name="correo" placeholder="Escribe tu usuario" required>
		</label>
		<br><br>
          
        <label>
			Asunto:<br><br>
			<input style="width:500px; height:150px" id="campo2" type="text" name="asunto" placeholder="Cuentanos..." required>
		</label>
        <br><br>
          <input class="btn" onclick="recibe(event);" type="submit" value="Contactame!" name="enviar"> <br>
	</form>
<div>
<div class="regresa"><a class="alta_1" href="Home.php">Regresar al inicio...</a></div>
<img id="personaje" class="personaje_3"src="../imagenes/Zombi_corriendo.gif"/>
<br><br><br><br>
</div>
<br><br><br><br>
        <div id="mensaje" class="error"></div>
     </div>
</body>
</html>

