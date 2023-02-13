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

    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

     <title>Alta_usuario</title>

     <script src="js/jquery-3.3.1.min.js"></script>

     <script>
          var validEmail = false;
          
          function validate_email() {
              let correo = document.forma01.correo.value;
               
              //evaluar los casos
              if(correo != ''){
                    // Campos llenos? 
                        $.ajax({
                        url : 'admistradores_valida_email.php',
                        type: 'post',
                        dataType: 'text',
                        data: 'correo='+correo,
          
                        success : function( data ){
                              if ( data == 1 ) {
                                   $('#mensaje_correo').html('El correo '+ correo +' ya existe');
                                   //hacer que desaparezca despues de 5 seg
                                   setTimeout("$('#mensaje_correo').html('');", 5000);
                                   // el correo existe, por lo tanto la bandera no cambia
                                   validEmail = false;
                              } else {
                                   //casi exitoso
                                   validEmail = true;
                              }
                        },error: function(){
                            alert('Error archivo no encontrado...');
                        }
                    });
               }
               else
               $('#mensaje').html('Faltan campos por llenar');
               setTimeout("$('#mensaje').html('');", 5000);
          }
          
          function recibe( e ){
               e.preventDefault();

               
               let nombre = document.forma01.nombre.value;
               let apellidos = document.forma01.apellido.value;
               let correo = document.forma01.correo.value;
               let rol = document.forma01.rol.value;
               let pass = document.forma01.pass.value;
               
               //evaluar los casos
               if(nombre != '' && correo != '' && rol != "0" && pass != ''){
                    // si solo falta el correo valido
                    if ( validEmail == false ) {
                         $('#mensaje').html('El email'+ correo +' ya existe ');
                         setTimeout("$('#mensaje').html('');", 5000);
                         return;
                    }
                    else{
                         // si todos los campos estan llenos y el email es valido
                         document.forma01.submit();
                    }
               }
               else {
                    $('#mensaje').html('Faltan campos por llenar');
                    setTimeout("$('#mensaje').html('');", 5000);
               }
          }
     </script>
</head>
<body align="center">
     <h1 class="neon">Alta de Administradores</h1>
     <div class="muestra"><br>
     <form name="forma01" action="administradores_salva.php" method="POST" enctype="multipart/form-data" >
		<label>
			Nombre:
			<input id="campo1" type="text" name="nombre" placeholder="Escribe tu nombre" required>
		</label>
          <br><br>

		<label>
			Apellidos:
			<input id="campo2" type="text" name="apellido" placeholder="Escribe tu apellido" required>
		</label>
		<br><br>

		<label>Correo:</label>
		<input type="email" name="correo" value="@gmail.com" onblur="validate_email();"><br>
          <div id="mensaje_correo" class="error"></div>
		<br>
          
		<label for="rol">Rol:</label>
		<select name="rol">
			<option value="0" selected>Selecciona</option>
			<option value="1">Gerente</option>
			<option value="2">Ejecutivo</option>			
		</select>
		<br><br>

		<label for="pass">Contraseña:</label>
		<input type="password" name="pass">
		<br><br><br>
          
          <input type="file" id="archivo" name="archivo" ><br><br>
          
          <input class="btn" onclick="recibe(event);" type="submit" value="Salvar"> <br>
	</form>

<div>
<div class="regresa"><a class="alta_1" href="administradores_lista.php">Regresar al listado...</a></div>
<img id="personaje" class="personaje_3"src="imagenes/Zombi_corriendo.gif"/>
<br><br><br><br>
</div>
<br><br><br><br>
     <div id="mensaje" class="error"></div>
     
     
     </div>
</body>
</html>

