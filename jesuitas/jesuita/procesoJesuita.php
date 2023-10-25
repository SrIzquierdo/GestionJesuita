<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stilo.css">
    </head>
    <body>
        <?php
            require '../conexion.php';
            
            $tipo=$_POST["tipo"];
            $sql="nada";
            $texto="a";
            switch ($tipo){
                case '1':
                    /* Alta */
                    $id=(int)$_POST["id"];
                    $nombre=$_POST["nombre"];
                    $firma=$_POST["firma"];

                    $sql="INSERT INTO jesuita(idJesuita,nombre,firma)VALUES(".$id.",'".$nombre."','".$firma."');";
                    $texto="añadido";
                    break;
                case '2':
                    /* Modificación */
                    $id=(int)$_POST["id"];
                    $nombre=$_POST["nombre"];
                    $firma=$_POST["firma"];
                    $idAntiguo=$_POST["idAntiguo"];

                    $sql="UPDATE jesuita SET idJesuita = ".$id.", nombre = '".$nombre."', firma = '".$firma."' WHERE idJesuita=".$idAntiguo.";";
                    $texto="modificado";
                    break;
                case '3':
                    /* Borrado */
                    $id=(int)$_POST["id"];

                    $sql="DELETE FROM jesuita WHERE idJesuita = ".$id.";";
                    $texto="eliminado";
            }
            /* Acceder a la base de datos */

	        $Resultado=$Conexion->query($sql);
            if($Conexion->affected_rows==0){echo "<h2>No se han ".$texto." ninguna fila</h2>";}
            elseif($Conexion->affected_rows==-1){echo "<h2>Ha habido un error al ".$texto." de la fila</h2>";}
            else{echo "<h2>Se han ".$texto." ".$Conexion->affected_rows." fila</h2>";}
            $Conexion->close();
        ?>
        <p><a href="../index.html">Inicio</a></p>
    </body>
</html>