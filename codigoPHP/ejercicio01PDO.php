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
        </style>
    </head>
    <body>
        <?php
        /*
         * Ejercicio 01
         * @author Aroa Granero Omañasç
         * Fecha Creacion:  04/11/2021
         * Última modificación: 05/11/2021
         */
        require_once '../config/confDBPDO.php';

        try {
            //Establecimiento de la conexión 
            $cConexionDB = new PDO(HOST, USER, PASSWORD);
            $cConexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Configuramos las excepciones
            // Array de atributos de la conexión.
            $aAtributos = [
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION"
            ];

            // Recorrido y mostrado de los atributos de la conexión.
            echo '<table>';
            foreach ($aAtributos as $atributo) {
                echo "<tr><td>PDO::ATTR_$atributo: </td>";
                echo '<td>' . $cConexionDB->getAttribute(constant("PDO::ATTR_$atributo")) . "</td></tr>";
            }
            echo '</table>';
            echo "<h3>Conexion Establecida con Exito</<h3>";
           
        } catch (PDOException $excepcion) {//Código que se ejecutará si se produce alguna excepción
            $miDB->rollback();//Si hubo error revierte los cambios
            //Almacenamos el código del error de la excepción en la variable $errorExcepcion
            $errorExcep = $excepcion->getCode(); 
            //Almacenamos el mensaje de la excepción en la variable $mensajeExcep
            $mensajeExcep = $excepcion->getMessage(); 

            echo "<span style='color: red;'>Error: </span>" . $mensajeExcep. "<br>"; //Mostramos el mensaje de la excepción
            echo "<span style='color: red;'>Código del error: </span>" . $errorExcep; //Mostramos el código de la excepción
        }finally {
             // Cierre de la conexión.
            unset($cConexionDB);
        }
        ?>
    </body>
</html>