


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>Ejercicio 2</title>
        <style>
            /* Add a black background color to the top navigation */
            .topnav {
                background-color: #333;
                overflow: hidden;
                margin-bottom: 30px;
            }

            /* Style the links inside the navigation bar */
            .topnav a {
                float: left;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 20px;
            }

            /* Change the color of links on hover */
            .topnav a:hover {
                background-color: rgb(77, 157, 182);
                color: black;
            }


        </style>
    </head>
    <body>
        <div class="topnav">
        <a href="../indexProyectoTema4.php">&#8666;</a>
        <a href="https://github.com/aroago">GitHub</a>
        <a href="../mostrarCodigo/ejercicio02MySQLi.php">Codigo</a>
        <a href="../../index.php">&#127968;</a>
    </div>
        <?php
        /*
         * Ejercicio 02
         * @author Aroa Granero Omañas
         * Última modificación: 08/11/2021
         */
        require_once '../config/confDBMySQL.php';
        /* utilizando el método connect */
        $oConexionDB = mysqli_connect(HOST, USER, PASSWORD, DB);

        $resultadoConsulta = $oConexionDB->query('SELECT * FROM Departamento');
        $registroArray = $resultadoConsulta->fetch_object();
        echo "<table>";
        echo "<tr>";
        foreach ($registroArray as $clave => $valor) {
            echo "<th>$clave</th>";
        }
        echo "</tr>";
        while (!is_null($registroArray)) {
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