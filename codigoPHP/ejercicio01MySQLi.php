


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>Ejercicio 1</title>
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
            <a href="../../index.php">&#127968;</a>
            <a href="https://github.com/aroago">GitHub</a>
            <a href="../mostrarCodigo/ejercicio01MySQLi.php">Codigo</a>
        </div>
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