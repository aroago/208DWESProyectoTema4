


<!DOCTYPE html>
<!--Aroa Granero Omañas 
Fecha Creacion: 10/11/2021
Fecha Modificacion: 10/11/2021 -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>ejercicio 04 PDO</title>
        <style>


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

            form{
                background-color: white;
                border-radius: 5px;
            }
            #btnEnviar{
                width:150px;
                height:30px;
                background-image: linear-gradient(90deg, #00C0FF 0%, #FFCF00 49%, #FC4F4F 80%, #00C0FF 100%);
                border-radius:30px;
                align-items:center;
                justify-content:center;
                text-transform:uppercase;
                font-size:20px;
                font-weight:bold;
            }
            #btnEnviar:hover {
                color: white;
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
            <a href="../mostrarCodigo/ejercicio04PDO.php">Codigo</a>
            <a href="../../index.php">&#127968;</a>
        </div>
        <h2>Formulario e inserccion de datos en tabla</h2>

        <?php
        /*
         * @author: Aroa Granero Omañas
         * @version: v1
         * Created on: 10/11/2021
         * Last modification: 10/11/2021
         */
        require_once '../core/210322ValidacionFormularios.php'; // incluyo la libreria de validacion para validar los campos de formulario
        require_once '../config/confDBPDO.php';

        //Inicializa una variable que nos ayudará a controlar si todo esta correcto
        $entradaOK = true;

        //Inicializa un array que se encargará de recoger los datos del formulario
        $aFormulario = [
            'DescDepartamento' => null,
        ];
        try {

            $mydb = new PDO(HOST, USER, PASSWORD); //Establecer una conexión con la base de datos 
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['Enviar'])) {                                      //Cuando se pulsa el boton de buscar
                $aFormulario['DescDepartamento'] = $_REQUEST['DescDepartamento']; //Guardamos en la variable lo que se ha introducido en el formulario
                $DescDepartamento = $aFormulario['DescDepartamento'];

                $consulta = "SELECT * FROM Departamento WHERE DescDepartamento LIKE '%$DescDepartamento%'"; //Guardamos en la variable la consulta que queremos hacer
                $resultadoConsulta = $mydb->prepare($consulta); //Preparamos la consulta
                $resultadoConsulta->execute();
                if ($resultadoConsulta->rowCount() == 0) {
                    echo "No se ha encontrado ningún departamento con esa descripción";
                } else
                //mostrar tabla
                    echo "<table>";
                echo "<tr>";
                echo "<th>Codigo</th>";
                echo "<th>Descripción</th>";
                echo "<th>Volumen de Negocio</th>";
                echo "</tr>";
                //Al realizar el fetchObject, se pueden sacar los datos de $registro como si fuera un objeto
                while ($registro = $resultadoConsulta->fetchObject()) {
                    echo "<tr>";
                    echo "<td>$registro->CodDepartamento</td>";
                    echo "<td>$registro->DescDepartamento</td>";
                    echo "<td>$registro->VolumenNegocio</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            echo "<p style='color: green;'> SE HA ESTABLECIDO LA CONEXION </p><br>"; //Salta el mensaje de conexion establecida   
        } catch (PDOException $miExceptionPDO) {       //Si no se ha podido ejecutar saltara la excepcion
            echo "<h3>Mensaje de ERROR</h3>";
            //Mensaje de salida
            echo "Error: " . $miExceptionPDO->getMessage() . "<br>";
            //Código del error
            echo "Código de error: " . $miExceptionPDO->getCode();
        } finally {
            //Cerramos la conexion
            unset($mydb);
        }
        ?>
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <legend>Buscar Departamento</legend>
                <div>
                    <label for="DescDepartamento">Descripcion del Departamento</label>
                    <input style="background-color:#CCF8F4;" type="text" id="DescDepartamento" name="DescDepartamento" placeholder="Introduzca Descripcion del Departamento" value="<?php
                    echo (isset($_REQUEST['DescDepartamento'])) ? $_REQUEST['DescDepartamento'] : ""; // si el campo esta correcto mantengo su valor en el formulario
                    ?>">                              
                </div> 
            </fieldset>
            <input id="btnEnviar" type="submit" value="Insertar" name="Enviar">
        </form>

    </body>
</html>
