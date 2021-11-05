<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>Ejercicio 1</title>
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
            
            //Establecimiento de la conexión 
            $cConexionDB = new PDO(HOST, USER, PASSWORD);

            $attributes = array(
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
                "TIMEOUT"
            );

            foreach ($attributes as $val) {
                echo "PDO::ATTR_$val: ";
                echo $cConexionDB->getAttribute(constant("PDO::ATTR_$val")) . "\n";
                echo "<br>";
            }
             //Cerrar la conexión
             unset($cConexionDB);
?>
    </body>
</html>