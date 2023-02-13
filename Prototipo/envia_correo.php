<?php
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $asunto = $_POST['asunto'];

        $header = "From: danizaragoza133@gmail.com";
        $mensaje = $asunto. "\nAtentamente: Zombi_Game_Official";

        @mail($correo, $nombre, $mensaje, $header);

        echo "<script> 
            $('#mensaje').html('Correo enviado con exito!');
            setTimeout(\"$('#mensaje').html('');\", 5000);
        </script>";
        header("Location: Home.php");

?>