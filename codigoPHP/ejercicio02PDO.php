<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>Ejercicio 2</title>
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
                color:blue;
            }
        </style>
    </head>
    <body>
        <?php
        /*
         * Ejercicio 02
         * @author Aroa Granero Omañasç
         * Fecha Creacion:  04/11/2021
         * Última modificación: 05/11/2021
         */
        require_once '../config/confDBPDO.php';
        echo "<h1>Ejercicio 02 PDO</h1>";
        echo "<h2>2. Mostrar el contenido de la tabla Departamento y el número de registros.</h2>";
        try {
            //Establecimiento de la conexión 
            $mydb = new PDO(HOST, USER, PASSWORD);
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Configuramos las excepciones
            $sql = 'SELECT * FROM DAW208DBDepartamentos.Departamento';
            $resultadoConsulta = $mydb->query($sql);
            echo "<h3>Mediante Fech</h3>";
            if ($resultadoConsulta) {
                echo "<table>";
                $row = $resultadoConsulta->fetch();
                while ($row != null) {
                    echo "<tr>";
                    foreach ($row as $valor) {
                        if ($valor != null) {
                            echo "<td>" . $valor . "</td>";
                        } else {
                            echo "<td> null </td>";
                        }
                    }
                    $row = $resultadoConsulta->fetch();
                    echo "</tr>";
                }
                echo "</table>";
            }
            echo "Número de registros en la tabla Departamento: " . $resultadoConsulta->rowCount(); //Si la última sentencia SQL ejecutada por el objeto PDOStatement asociado fue una sentencia SELECT
            echo "<h3>Mediante FechObjet</h3>";
            echo '<h3>Mediante fetchAll</h3>';
            
            
        } catch (PDOException $excepcion) {//Código que se ejecutará si se produce alguna excepción
            //Almacenamos el código del error de la excepción en la variable $errorExcepcion
            $errorExcep = $excepcion->getCode();
            //Almacenamos el mensaje de la excepción en la variable $mensajeExcep
            $mensajeExcep = $excepcion->getMessage();

            echo "<span style='color: red;'>Error: </span>" . $mensajeExcep . "<br>"; //Mostramos el mensaje de la excepción
            echo "<span style='color: red;'>Código del error: </span>" . $errorExcep; //Mostramos el código de la excepción
        } finally {
            // Cierre de la conexión.
            unset($cConexionDB);
        }
        ?>
    </body>
</html>