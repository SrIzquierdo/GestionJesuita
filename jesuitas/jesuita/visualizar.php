<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stilo.css">
    </head>
    <body>
        <h1>Listado de Jesuitas y su Firma</h1>
        <p><a href="../index.html">Inicio</a></p>
        <?php
            require '../conexion.php';

            $sql = "SELECT * FROM jesuita;";
	        $Resultado=$Conexion->query($sql);

            /* Tabla de Jesuitas */
		    echo "<table><tr><th>ID</th><th>Nombre</th><th>Firma</th></tr>";
            while($fila = $Resultado->fetch_array()){
                echo "<tr><td>".$fila["idJesuita"]."</td><td>".$fila["nombre"]."</td><td>".$fila["firma"]."</td></tr>";
            }
            echo "</table>";
            $Conexion->close();
        ?>
    </body>
</html>