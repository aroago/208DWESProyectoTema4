


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>Ejercicio 1</title>
        <style>
            body{
                text-align: center;

            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
            td,tr{
                border: solid 3px cadetblue;
            }
            h3{
                color:green;
            }
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
            <a href="../mostrarCodigo/ejercicio01PDO.php">Codigo</a>
            <a href="../../index.php">&#127968;</a>
        </div>
        <?php
        /*
         * Ejercicio 01
         * @author Aroa Granero Omañas
         * Fecha Creacion:  04/11/2021
         * Última modificación: 05/11/2021
         */
        require_once '../config/confDBPDO.php';

        try {
            //Establecimiento de la conexión 
            $mydb = new PDO(HOST, USER, PASSWORD);
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Configuramos las excepciones
            // Array de atributos de la conexión.
            $aAtributos = [
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION"
            ];

            // Recorrido y mostrado de los atributos de la conexión.
            echo '<table>';
            foreach ($aAtributos as $atributo) {
                echo "<tr><td>PDO::ATTR_$atributo: </td>";
                echo '<td>' . $mydb->getAttribute(constant("PDO::ATTR_$atributo")) . "</td></tr>";
            }
            echo '</table>';
            echo "<h3>Conexion Establecida con Exito</<h3>";
        } catch (PDOException $excepcion) {//Código que se ejecutará si se produce alguna excepción
            //Almacenamos el código del error de la excepción en la variable $errorExcepcion
            $errorExcep = $excepcion->getCode();
            //Almacenamos el mensaje de la excepción en la variable $mensajeExcep
            $mensajeExcep = $excepcion->getMessage();

            echo "<span style='color: red;'>Error: </span>" . $mensajeExcep . "<br>"; //Mostramos el mensaje de la excepción
            echo "<span style='color: red;'>Código del error: </span>" . $errorExcep; //Mostramos el código de la excepción
        } finally {
            // Cierre de la conexión.
            unset($mydb);
        }
        ?>
        <!-------------------ERROR CODIGO-------------------------->
        <?php
        /*
         * Ejercicio 01 Con Error
         * @author Aroa Granero Omañas
         * Fecha Creacion:  09/11/2021
         * Última modificación: 09/11/2021
         */
        require_once '../config/confDBPDO.php';

        try {
            echo "<h1>ERROR EN LA CONTRASEYNA</h1>";
            //Establecimiento de la conexión 
            $mydb = new PDO(HOST, USER, "paso");
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Configuramos las excepciones
            // Array de atributos de la conexión.
            $aAtributos = [
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION"
            ];

            // Recorrido y mostrado de los atributos de la conexión.
            echo '<table>';
            foreach ($aAtributos as $atributo) {
                echo "<tr><td>PDO::ATTR_$atributo: </td>";
                echo '<td>' . $mydb->getAttribute(constant("PDO::ATTR_$atributo")) . "</td></tr>";
            }
            echo '</table>';
            echo "<h3>Conexion Establecida con Exito</<h3>";
        } catch (PDOException $excepcion) {//Código que se ejecutará si se produce alguna excepción
            //Almacenamos el código del error de la excepción en la variable $errorExcepcion
            $errorExcep = $excepcion->getCode();
            //Almacenamos el mensaje de la excepción en la variable $mensajeExcep
            $mensajeExcep = $excepcion->getMessage();

            echo "<span style='color: red;'>Error: </span>" . $mensajeExcep . "<br>"; //Mostramos el mensaje de la excepción
            echo "<span style='color: red;'>Código del error: </span>" . $errorExcep; //Mostramos el código de la excepción
        } finally {
            // Cierre de la conexión.
            unset($mydb);
        }
        ?>
    </body>
</html>