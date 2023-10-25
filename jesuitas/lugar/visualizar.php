<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stilo.css">
    </head>
    <body>
        <h1>Listado de Lugares y su Descripción</h1>
        <p><a href="../index.html">Inicio</a></p>
        <?php
            require '../conexion.php';

            $sql = "SELECT * FROM lugar;";
	        $Resultado=$Conexion->query($sql);

            /* Tabla de Jesuitas */
		    echo "<table><tr><th>IP</th><th>Lugar</th><th>Descripción</th></tr>";
            while($fila = $Resultado->fetch_array()){
                echo "<tr><td>".$fila["ip"]."</td><td>".$fila["lugar"]."</td><td>".$fila["descripcion"]."</td></tr>";
            }
            echo "</table>";
            $Conexion->close();
        ?>
    </body>
</html>