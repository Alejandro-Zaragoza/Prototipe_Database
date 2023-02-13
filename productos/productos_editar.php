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
    
    <title>Productos editar</title>
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">

    <script src="../js/jquery-3.3.1.min.js"></script>

    <script>
          var validCode = false;
          
          function validate_codigo() {
              let codigo = document.forma01.codigo.value;
              let id = document.forma01.id.value;
               
              //evaluar los casos
              if(codigo != ''){
                    // Campos llenos? 
                        $.ajax({
                        url : 'productos_valida_codigo.php',
                        type: 'post',
                        dataType: 'text',
                        data:"codigo=" + encodeURIComponent(codigo) + "&id=" + encodeURIComponent(id),
                        
          
                        success : function( data ){
                              if ( data == 1 ) {
                                
                                   $('#mensaje_codigo').html('El codigo '+ codigo +' ya existe');
                                   //hacer que desaparezca despues de 5 seg
                                   setTimeout("$('#mensaje_codigo').html('');", 5000);
                                   // el codigo existe, por lo tanto la bandera no cambia
                                   validCode = false;
                              } else {
                                   //caso exitoso
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

               let id= document.forma01.id.value;
               let nombre_p = document.forma01.nombre_p.value;
               let codigo = document.forma01.codigo.value;
               let costo = document.forma01.costo.value;
               let stock = document.forma01.stock.value;
               let descripcion = document.forma01.descripcion.value;
               
               validate_codigo(id);
               //evaluar los casos
               if(nombre_p != '' && codigo != '' && costo != "0" && stock != ''){
                        
                    // si solo falta el codigo valido
                    if ( validCode == false ) {
                        console.log("entra aqui");
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
<body align ="center">

<h1 class="neon">Editar producto</h1>

<div class = "muestra" >
<form name="forma01" action="productos_actualiza.php" method="POST"  enctype="multipart/form-data">
            
    <?php
        require "../funciones/conecta.php";
        $con = conecta();

        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM productos WHERE id = $id";
        $res = $con->query($sql);
        
        while($row = $res->fetch_array()) {

            $id = $row["id"];
            $nombre_p = $row["nombre_p"];
            $codigo = $row["codigo"];
            $costo = $row["costo"];
            $stock = $row["stock"];
            $descripcion = $row["descripcion"];
echo"<br>
          <input name=\"id\" type=\"hidden\" value=\"$id\" >
          <label>
			Nombre:
			<input id=\"campo1\" type=\"text\" name=\"nombre_p\" value=\"$nombre_p\" >
		</label>

          <br><br>

		<label>
			Codigo:
			<input id=\"campo2\" type=\"text\" name=\"codigo\" value=\"$codigo\" onblur=\"validate_codigo();\">
		</label><br>
        <div id=\"mensaje_codigo\" class=\"error\"></div>
		<br><br>

		<label>
            Costo:
            <input type=\"number\" name=\"costo\" value=\"$costo\">
        </label>
		<br><br>
          
        <label>
            Stock:
            <input id=\"campo2\" type=\"text\" name=\"stock\" value=\"$stock\" >
        </label>
        <br><br>

        <label>
            Descripción:<br>
            <input id=\"campo2\" type=\"text\" name=\"descripcion\" value=\"$descripcion\" style=\"width:500px; height:150px\">
        </label>
        <br><br>
        ";

    echo"
		<br><br><br>
          <input type=\"file\" id=\"archivo\" name=\"archivo_p\" ><br><br>

        <div id=\"mensaje\" class=\"error\"> </div>
        
        <br>"; }

    ?>

    <input class="btn" onclick="recibe(event);" type="submit" value="Salvar">

    </form>

            <div>
                <div class="regresa"><a class="alta_1" href="productos_lista.php">Regresar al listado...</a></div>
                <img id="personaje" class="personaje_3"src="../imagenes/Zombi_corriendo.gif"/>
                <br><br><br><br>
                </div>
            </div>
</body>
</html>