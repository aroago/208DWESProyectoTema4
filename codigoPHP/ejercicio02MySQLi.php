<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <?php
         /*
            * Ejercicio 02
            * @author Aroa Granero Omañas
            * Última modificación: 08/11/2021
            */
        require_once '../config/confDBMySQL.php';
        /* utilizando el método connect */
            $oConexionDB = mysqli_connect(HOST, USER, PASSWORD, DB);
            
            $resultadoConsulta=$oConexionDB->query('SELECT * FROM Departamento');
            $registroArray = $resultadoConsulta->fetch_object();
            echo "<table>";
            echo "<tr>";
            foreach ($registroArray as $clave => $valor) {
                        echo "<th>$clave</th>";
                }
                echo "</tr>";
            while(!is_null($registroArray)){
                echo "<tr>";
                foreach ($registroArray as $clave => $valor) {
                        echo "<td>$valor</td>";

                }
                echo "</tr>";
                $registroArray = $resultadoConsulta->fetch_object();
            }
            echo "</table>";
            $resultadoConsulta->free();
            //Cerrar la conexión
            $oConexionDB->close();
        ?>
    </body>
</html>