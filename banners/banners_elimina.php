<?php
        //banners_elimina.php
        require "../funciones/conecta.php";
        $con = conecta();

        //Recibe variables
        $id = $_POST['id'];

        //$sql = "DELETE FROM productos WHERE id = $id";
        $sql = "UPDATE banners
                SET eliminado = 1
                WHERE id = $id";

        $res = $con->query($sql);

?>
