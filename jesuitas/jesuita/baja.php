<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stilo.css">
    </head>
    <body>
        <h1>Eliminación</h1>
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

                if($Resultado->num_rows==0){echo "<h2>Ese jesuita no existe.</h2>";}
                else{
                    echo "<table><tr><th>ID</th><th>Nombre</th><th>Firma</th></tr>";
                    while($fila = $Resultado->fetch_array()){
                        echo "<tr><td>".$fila["idJesuita"]."</td><td>".$fila["nombre"]."</td><td>".$fila["firma"]."</td></tr>";
                    }
                    echo "</table>";

                    echo '
                        <form action=procesoJesuita.php method=POST>
                            <p>¿Es este el jesuita que desea eliminar?</p>
                            <input type=hidden name=id value="'.$id.'">
                            <input type=hidden name="tipo" value="3">
                            <input type=submit value=SÍ>
                        </form>';
                }
                $Conexion->close();
            }
        ?>
    </body>
</html>