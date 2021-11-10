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
        require_once '../config/confDBMySQL.php';
        /* utilizando el método connect */
        $mydb = new mysqli();
        $mydb->connect(HOST, USER, PASSWORD, DB);
        //Muestra de la conexión por pantalla
        echo "<h3>Valores de la conexion:</h3>";
        echo "<pre>";
        print_r($mydb);
        echo "</pre>";
        /* Comprueba el establecimiento de una conexión con la base de datos 
         * "dwes" y finaliza la ejecución si se produce algún error: */
        $error = $mydb->connect_errno;
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos: $mydb->connect_error</p>";
            exit();
        }
        //Valor que cuenta los posibles errores
        echo "<h3>Errores:</h3>";
        echo $error;
        /* Una vez finalizadas las tareas con la base de datos, utiliza el método close  
         * para cerrar la conexión con la base de datos */
        $mydb->close();
        
        
        
        //--------------------CON ERRORES-----------
        $mydb = mysqli_connect('192.168.3.108', 'usuarioDAW208DBDepartamentos', 'P@ssw0rd', 'PEPA');

        //Muestra de la conexión por pantalla
        echo "<h3>Valores de la conexion:</h3>";
        echo "<pre>";
        print_r($mydb);
        echo "</pre>";
        /* Comprueba el establecimiento de una conexión con la base de datos 
         * "dwes" y finaliza la ejecución si se produce algún error: */
        $error = $mydb->connect_errno;
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos: $mydb->connect_error</p>";
            exit();
        }
        //Valor que cuenta los posibles errores
        $error = $mydb->connect_errno;
        echo "<h3>Errores:</h3>";
        echo $error;

        //Cerrar la conexión
        $mydb->close();
        ?>
    </body>
</html>