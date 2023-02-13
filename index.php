<?php
session_start();

// si existe la variable nombre en la sesion
if ( isset( $_SESSION['nombre'] ) ) {
    header( 'location: bienvenido.php' );
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

     <title>Login</title>

         <!-- importamos jQuery -->
         <script src="js/jquery-3.3.1.min.js"></script>

<script>
    function validar(){
        var user = $('#user').val();
        var pass = $('#pass').val();

        if(user != '' && pass != ''){
            $.ajax({
                url: 'funciones/validaUsuario.php',
                type: 'POST',
                dataType: 'text',
                data: 'user='+user+'&pass='+pass,
                success: function(res){
                    if(res == 1){
                        window.location.replace( "Prototipo/Home.php" );
                    }else{
                        $('#mensaje').html('Datos incorrectos');
                        setTimeout("$('#mensaje').html('')",5000);
                    }
                },error: function(){
                    alert('Error al conectar al servidor...');
                }
            });
        }
        else{
            $('#mensaje').html('Faltan datos por llenar');
            setTimeout("$('#mensaje').html('')",5000);
        }
    }
</script>

</head>
<body align="center">
<h1 class="neon">INICIO DE SESION</h1>
<img class="personaje_login"src="imagenes/Zombi_corazon.gif"/>
<img class="personaje_login_1"src="imagenes/Zombi_corazon.gif"/>

<div class="muestra"><br><br><br>
		<label>Usuario:</label>
			<input id="user" class="alinear" type="email" name="user" placeholder="Escribe tu usuario" >
            <br><br>
            
		<label for="pass">Contraseña:</label>
			<input id="pass" type="password" name="pass">
            <div id="mensaje_correo"></div>
            <div id="mensaje" class="error"></div>
            <br><br>

        <input class="btn" onclick="validar();" type="button" value="Iniciar sesion"><br><br><br>    
</div>

</body>
</html>
