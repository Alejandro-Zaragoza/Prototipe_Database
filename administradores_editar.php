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
    
    <title>Administradores editar</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

    <script src="js/jquery-3.3.1.min.js"></script>

    <script>
          var validEmail = false;
          
          function validate_email() {
               let id = document.forma01.id.value;
              let correo = document.forma01.correo.value;

              if( correo != '' ) {
                     // Campos llenos? 
                        $.ajax({
                        url : 'admistradores_valida_email.php',
                        type: 'post',
                        dataType: 'text',
                        data:"correo=" + encodeURIComponent(correo) + "&id=" + encodeURIComponent(id),
                        success : function( data ){
                              if ( data == 1 ) {
                                   $('#mensaje_correo').html('El correo '+ correo +' ya existe');
                                   setTimeout("$('#mensaje_correo').html('');", 5000);
                                   validEmail = false;
                              }
                              else validEmail = true;
                         }
                         ,error: function(){
                            alert('Error archivo no encontrado...');
                        }
                    });
               }
          }
          
          function recibe( e ){
               e.preventDefault();

               let id = document.forma01.id.value;
               let nombre = document.forma01.nombre.value;
               let apellidos = document.forma01.apellidos.value;
               let correo = document.forma01.correo.value;
               let rol = document.forma01.rol.value;
               let pass = document.forma01.pass.value;
               
               validate_email( id );
               //evaluar los casos
               if(nombre != '' && correo != '' && rol != "0" && apellidos !=''){
                    // si solo falta el correo valido

                    //if ( validEmail == false ) {
                    //     return; // si no esperas el resultado de validate_email entonce siempre es false
                    //}
                    //else{
                         // si todos los campos estan llenos y el email es valido
                         document.forma01.submit();
                    //}
               }
               else {
                    $('#mensaje').html('Faltan campos por llenar');
                    setTimeout("$('#mensaje').html('');", 5000);
               }
          }
     </script>

</head>
<body align ="center">

<h1 class="neon">Editar administrador</h1>

<div class = "muestra" >
<form name="forma01" action="administradores_actualiza.php" method="POST"  enctype="multipart/form-data">
            
    <?php
        require "funciones/conecta.php";
        $con = conecta();

        $id = $_GET['id'];

        $sql = "SELECT * FROM administradores WHERE status = 1 AND eliminado = 0 AND id = $id";
        $res = $con->query($sql);
        
        while($row = $res->fetch_array()) {

            $id = $row["id"];
            $nombre = $row["nombre"];
            $apellidos = $row["apellidos"];
            $correo = $row["correo"];
            $rol = $row["rol"];
            $status = $row["status"];
echo"<br>
          <input name=\"id\" type=\"hidden\" value=\"$id\" >
          <label>
			Nombre:
			<input id=\"campo1\" type=\"text\" name=\"nombre\" value=\"$nombre\" >
		</label>

          <br><br>

		<label>
			Apellidos:
			<input id=\"campo2\" type=\"text\" name=\"apellidos\" value=\"$apellidos\" >
		</label>
		<br><br>

		<label>Correo:</label>
		<input type=\"email\" name=\"correo\" value=\"$correo\" onblur=\"validate_email();\"><br>
          <div id=\"mensaje_correo\" class=\"error\"></div>
		<br>
          
		<label for=\"rol\">Rol:</label>
		<select name=\"rol\" >
        ";

        if($rol == 1){
            echo "
            <option value=0 selected>Selecciona</option>
			<option selected value=1>Gerente</option>
			<option value=2>Ejecutivo</option>	";		
        }

        if($rol == 2){
            echo "
            <option value=0 selected>Selecciona</option>
			<option value=1>Gerente</option>
			<option selected value=2>Ejecutivo</option> ";			
        }
    echo"
		</select>
		<br><br>

		<label for=\"pass\">Contraseña:</label>
		<input type=\"password\" name=\"pass\">
		<br><br><br>
          <input type=\"file\" id=\"archivo\" name=\"archivo\" ><br><br>

        <div id=\"mensaje\" class=\"error\"> </div>
        
        <br>"; }

    ?>

    <input class="btn" onclick="recibe(event);" type="submit" value="Salvar">

    </form>

            <div>
            <div class="regresa"><a class="alta_1" href="administradores_lista.php">Regresar al listado...</a></div>
            <img id="personaje" class="personaje_3"src="imagenes/Zombi_corriendo.gif"/>
            <br><br><br><br>
            </div>

</div>
</body>
</html>