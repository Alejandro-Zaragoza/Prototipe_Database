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
    
    <title>Banners editar</title>
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

    <script src="../js/jquery-3.3.1.min.js"></script>

    <script>
          var validName = false;
          
          function validate_name() {
              let nombre_b = document.forma01.nombre_b.value;
              let id = document.forma01.id.value;
               
              //evaluar los casos
              if(nombre_b != ''){
                    // Campos llenos? 
                        $.ajax({
                        url : 'banners_valida_nombre.php',
                        type: 'post',
                        dataType: 'text',
                        data:"nombre_b=" + encodeURIComponent(nombre_b) + "&id=" + encodeURIComponent(id),
                        
          
                        success : function( data ){
                              if ( data == 1 ) {
                                
                                   $('#mensaje_nombre').html('El nombre '+ nombre_b +' ya existe');
                                   //hacer que desaparezca despues de 5 seg
                                   setTimeout("$('#mensaje_codigo').html('');", 5000);
                                   // el codigo existe, por lo tanto la bandera no cambia
                                   validName = false;
                              } else {
                                   //caso exitoso
                                   validName = true;
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

               let nombre_b = document.forma01.nombre_b.value;
               let archivo_b = document.forma01.archivo_b.value;

               //evaluar los casos
               if(nombre_b != '' && archivo_b != '' ){
                    // si solo falta el name valido
                    validate_name( );
                    if ( validName == false ) {
                         $('#mensaje').html('El nombre '+ nombre_b +' ya existe ');
                         setTimeout("$('#mensaje').html('');", 5000);
                         return;
                    }
                    else{
                         // si todos los campos estan llenos y el name es valido
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
<body align ="center">

<h1 class="neon">Editar Banner</h1>

<div class = "muestra" >
<form name="forma01" action="banners_actualiza.php" method="POST"  enctype="multipart/form-data">
            
    <?php
        require "../funciones/conecta.php";
        $con = conecta();

        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM banners WHERE id = $id";
        $res = $con->query($sql);
        
        while($row = $res->fetch_array()) {

            $id = $row["id"];
            $nombre_b = $row["nombre_b"];

echo"<br>
          <input name=\"id\" type=\"hidden\" value=\"$id\" >
          <label>
			Nombre:
			<input id=\"campo1\" type=\"text\" name=\"nombre_b\" value=\"$nombre_b\" >
		</label>";

          

echo"
		<br><br><br>
          <input type=\"file\" id=\"archivo\" name=\"archivo_b\" ><br><br>

        <div id=\"mensaje\" class=\"error\"> </div>
        
        <br>"; }

    ?>

    <input class="btn" onclick="recibe(event);" type="submit" value="Salvar">

    </form>

            <div>
                <div class="regresa"><a class="alta_1" href="banners_lista.php">Regresar al listado...</a></div>
                <img id="personaje" class="personaje_3"src="../imagenes/Zombi_corriendo.gif"/>
                <br><br><br><br>
                </div>
            </div>
</body>
</html>