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

     <title>Alta_producto</title>

     <script src="../js/jquery-3.3.1.min.js"></script>

     <script>
          var validCode = false;
          
          function validate_codigo( ) {
              let codigo = document.forma01.codigo.value;
               
              //evaluar los casos
              if(codigo != ''){
                    // Campos llenos? 
                        $.ajax({
                        url : 'productos_valida_codigo_2.php',
                        type: 'post',
                        dataType: 'text',
                        data: 'codigo='+codigo,
          
                        success : function( data ){
                              if ( data == 1 ) {
                                   $('#mensaje').html('El codigo '+ codigo +' ya existe');
                                   //hacer que desaparezca despues de 5 seg
                                   setTimeout("$('#mensaje').html('');", 5000);
                                   // el codigo existe, por lo tanto la bandera no cambia
                                   validCode = false;
                              } else {
                                   //casi exitoso
                                   validCode = true;
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

               let nombre_p = document.forma01.nombre_p.value;
               let codigo = document.forma01.codigo.value;
               let costo = document.forma01.costo.value;
               let stock = document.forma01.stock.value;
               let descripcion = document.forma01.descripcion.value;
               
               //evaluar los casos
               if(nombre_p != '' && codigo != '' && costo != "0" && stock != ''){
                    // si solo falta el codigo valido
                    validate_codigo( );
                    if ( validCode == false ) {
                         $('#mensaje').html('El codigo '+ codigo +' ya existe ');
                         setTimeout("$('#mensaje').html('');", 5000);
                         return;
                    }
                    else{
                         // si todos los campos estan llenos y el codigo es valido
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
     <h1 class="neon">Agregar producto</h1>
     <div class="muestra"><br>
     <form name="forma01" action="productos_salva.php" method="POST" enctype="multipart/form-data" >
		<label>
			Nombre:
			<input  type="text" name="nombre_p" placeholder="Escribe el nombre" required>
		</label>
          <br><br>

		<label>
			codigo:
			<input  type="text" name="codigo" placeholder="Escribe el codigo" onblur="validate_codigo()">
		</label>
		<br><br>

		<label>
            costo: $
		    <input type="number" name="costo" placeholder="$">
        </label>
        <br><br>

        <label>
            stock: 
		    <input type="number" name="stock" >
        </label>
        <br><br>

		<label>
            Descripción:<br>
		<input style="width:500px; height:150px" type="text" name="descripcion">
        </label>
		<br><br><br>
          
          <input type="file" id="archivo" name="archivo_p" ><br><br>
          <div id="mensaje" class="error"></div><br><br>
          
          <input class="btn" onclick="recibe(event);" type="submit" value="Salvar"> <br>
	</form>

<div>
<div class="regresa"><a class="alta_1" href="productos_lista.php">Regresar al listado...</a></div>
<img id="personaje" class="personaje_3"src="../imagenes/Zombi_corriendo.gif"/>
<br><br><br><br>   
</body>
</html>

