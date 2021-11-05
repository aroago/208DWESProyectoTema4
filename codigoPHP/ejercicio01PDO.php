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
            * @author Aroa Granero Omañas
            * Última modificación: 04/11/2021
            */
            define("HOST", "192.168.3.108");
            define("USUARIO", "usuarioDAW208DBDepartamentos");
            define("CONTRASENYA", "P@ssw0rd");
            define("BASEDEDATOS", "DAW208DBDepartamentos");
            //Establecimiento de la conexión 
            $cConexionDB = new PDO('mysql:dbname='.BASEDEDATOS.';host='.HOST, USUARIO, CONTRASENYA);

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