<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stilo.css">
    </head>
    <body>
        <h1>Modificación</h1>
        <p><a href="../index.html">Inicio</a></p>
        <form action="" method="get">
            <p>
                <label for="id">Identificador del Jesuita: </label>
                <input type="text" name="id">
            </p>
            <p><input type="submit"></p>
        </form>
        <?php
            if(isset($_GET["id"])){
                require '../conexion.php';

                $id=(int)$_GET["id"];

                $sql = "SELECT * FROM jesuita WHERE idJesuita = ".$id.";";
                $Resultado=$Conexion->query($sql);

                $fila=$Resultado->fetch_array();
                if(!$fila){echo "<h2>Ese jesuita no existe.</h2>";}
                else{
                    echo "<table><tr><th>ID</th><th>Nombre</th><th>Firma</th></tr>";
                    echo "<tr><td>".$fila["idJesuita"]."</td><td>".$fila["nombre"]."</td><td>".$fila["firma"]."</td></tr></table>";
                    echo '
                        <form action=procesoJesuita.php method=POST>
                            <p>
                                <label for="id">Número identificador del jesuita: </label>
                                <input type="text" name="id" value="'.$fila["idJesuita"].'">
                            </p>
                            <p>
                                <label for="nombre">Nombre completo del jesuita: </label>
                                <input type="text" name=nombre value="'.$fila["nombre"].'">
                            </p>
                            <p>
                                <label for="firma">Firma del jesuita: </label>
                                <input type="text" name="firma" value="'.$fila["firma"].'">
                            </p>
                            <p>¿Es este el jesuita que desea modificar?</p>
                            <input type=hidden name="idAntiguo" value="'.$fila["idJesuita"].'">
                            <input type=hidden name="tipo" value="2">
                            <input type=submit value="SÍ">
                        </form>';
                }
                $Conexion->close();
            }
        ?>
    </body>
</html>