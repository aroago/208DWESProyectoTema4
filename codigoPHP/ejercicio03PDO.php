


<!DOCTYPE html>
<!--Aroa Granero Omañas 
Fecha Creacion: 08/11/2021
Fecha Modificacion: 09/11/2021 -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>ejercicio 3 PDO</title>
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
            <a href="../../index.php">&#127968;</a>
            <a href="https://github.com/aroago">GitHub</a>
            <a href="../mostrarCodigo/ejercicio03PDO.php">Codigo</a>
        </div>
        <h2>Formulario e inserccion de datos en tabla</h2>
        <?php
        require_once '../core/210322ValidacionFormularios.php'; // incluyo la libreria de validacion para validar los campos de formulario
        require_once '../config/confDBPDO.php';

        define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorios
        define('MYSQL_FLOAT_MAX', 3.402823466E+38); // defino e inicializo la constante

        $entradaOK = true; // declaro la variable que determina si esta bien la entrada de los campos introducidos por el usuario

        $aErrores = [//declaro e inicializo el array de errores
            'CodDepartamento' => null,
            'DescDepartamento' => null,
            'VolumenNegocio' => null
        ];

        $aRespuestas = [// declaro e inicializo el array de las respuestas del usuario
            'CodDepartamento' => null,
            'DescDepartamento' => null,
            'VolumenNegocio' => null
        ];



        if (isset($_REQUEST["Enviar"])) { // compruebo que el usuario le ha dado a al boton de enviar y valido la entrada de todos los campos
            $aErrores['CodDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['CodDepartamento'], 3, 3, OBLIGATORIO); // compruebo que la entrada del codigo de departamento es correcta
            if ($aErrores['CodDepartamento'] == null) { // si no ha habido ningun error de validacion del campo del codigo del departamento
                try { // Bloque de código que puede tener excepciones en el objeto PDO
                    $mydb = new PDO(HOST, USER, PASSWORD); // creo un objeto PDO con la conexion a la base de datos

                    $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establezco el atributo para la apariciopn de errores y le pongo el modo para que cuando haya un error se lance una excepcion
                    /* $codDepartamento = $_REQUEST['CodDepartamento'];
                      $sql = "SELECT * FROM Departamento";
                      $consulta = $miDB->prepare($sql); // preparo la consulta

                      $consulta->execute(); // ejecuto la consulta

                      $registroConsulta = $consulta->fetchObject(); // Obtengo el primer registro de la consulta como un objeto
                      while ($registroConsulta) { // recorro los registros que devuelve la consulta de la consulta
                      if ($registroConsulta->CodDepartamento == strtoupper($_REQUEST['CodDepartamento'])) { // si hay algun codigo de departamento que coincida con lo que ha introducido el usuario
                      $aErrores['CodDepartamento'] = "El código de Departamento introducido ya existe"; // meto un mensaje de error en el array de errores del codigo del departamento
                      }
                      $registroConsulta = $consulta->fetchObject();  // guardo el registro actual como un objeto y avanzo el puntero al siguiente registro de la consulta
                      } */
                    //Con Where en la consulta
                    $sql = "SELECT CodDepartamento FROM Departamento WHERE CodDepartamento='{$_REQUEST['CodDepartamento']}'";
                    $consulta = $mydb->prepare($sql);
                    $consulta->execute();
                    //Si la consulta devuelve algún valor es porque el código está duplicado, da error
                    if ($consulta->rowCount() > 0) {
                        $aErrores['CodDepartamento'] = "El código de Departamento introducido ya existe";
                    }
                } catch (PDOException $miExceptionPDO) { // Codigo que se ejecuta si hay alguna excepcion
                    echo "<p style='color:red;'>ERROR</p>";
                    echo "<p style='color:red;'>Código de error: " . $miExceptionPDO->getCode() . "</p>"; // Muestra el codigo del error
                    echo "<p style='color:red;'>Error: " . $miExceptionPDO->getMessage() . "</p>"; // Muestra el mensaje de error
                    die();
                } finally {
                    unset($mydb); // destruyo la variable de la conexion a la base de datos
                }
            }

            $aErrores['DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'], 255, 1, OBLIGATORIO); // compruebo que la entrada de la descripcion del departamento es correcta
            $aErrores['VolumenNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['VolumenNegocio'], 3.402823466E+38, 0, OBLIGATORIO); // compruebo que la entrada del volumen de negocio del departamento es correcta

            foreach ($aErrores as $campo => $error) { // recorro el array de errores
                if ($error != null) { // compruebo si hay algun mensaje de error en algun campo
                    $entradaOK = false; // le doy el valor false a $entradaOK
                    $_REQUEST[$campo] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
                }
            }
        } else { // si el usuario no le ha dado al boton de enviar
            $entradaOK = false; // le doy el valor false a $entradaOK
        }

        if ($entradaOK) { // si la entrada esta bien recojo los valores introducidos y hago su tratamiento
            $aRespuestas['CodDepartamento'] = strtoupper($_REQUEST['CodDepartamento']); // strtoupper() transforma los caracteres de un string a mayuscula
            $aRespuestas['DescDepartamento'] = $_REQUEST['DescDepartamento'];
            $aRespuestas['VolumenNegocio'] = $_REQUEST['VolumenNegocio'];



            // TRATAMIENTO
            echo "<h2>Datos introducidos</h2>";
            echo "<p>CodDepartamento: " . $aRespuestas['CodDepartamento'] . "</p>";
            echo "<p>DescDepartamento: " . $aRespuestas['DescDepartamento'] . "</p>";
            echo "<p>Volumen de Negocio: " . $aRespuestas['VolumenNegocio'] . "</p>";


            // Mostrar Contenido de la tabla
            echo "<h2>Contenido tabla Departamento</h2>";
            try { // Bloque de código que puede tener excepciones en el objeto PDO
                $mydb = new PDO(HOST, USER, PASSWORD); // creo un objeto PDO con la conexion a la base de datos

                $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establezco el atributo para la apariciopn de errores y le pongo el modo para que cuando haya un error se lance una excepcion



                $sql2 = <<<CONSULTA
                            INSERT INTO Departamento(CodDepartamento,DescDepartamento,VolumenNegocio) VALUES 
                            (:CodDepartamento, :DescDepartamento,:VolumenNegocio);
                CONSULTA;
                $resultadoConsulta = $mydb->prepare($sql2); // preparo la consulta

                $parametros = [":CodDepartamento" => $aRespuestas['CodDepartamento'],
                    ":DescDepartamento" => $aRespuestas['DescDepartamento'],
                    ":VolumenNegocio" => $aRespuestas['VolumenNegocio']];

                $resultadoConsulta->execute($parametros); // ejecuto la consulta pasando los parametros del array de parametros


                $sql3 = "SELECT * FROM Departamento";
                $resultadoConsulta2 = $mydb->prepare($sql3); // preparo la consulta
                $resultadoConsulta2->execute(); // ejecuto la consulta
                ?>
                <table>
                    <tr>
                        <th>CodDepartamento</th>
                        <th>DescDepartamento</th>
                        <th>FechaBaja</th>
                        <th>VolumenNegocio</th>
                    </tr>
                    <?php
                    $oDepartamento = $resultadoConsulta2->fetchObject(); // Obtengo el primer registro de la consulta como un objeto
                    while ($oDepartamento) { // recorro los registros que devuelve la consulta de la consulta 
                        ?>
                        <tr>
                            <td><?php echo $oDepartamento->CodDepartamento; // obtengo el valor del codigo del departamento del registro actual     ?></td>
                            <td><?php echo $oDepartamento->DescDepartamento; // obtengo el valor de la descripcion del departamento del registro actual    ?></td>
                            <td><?php echo $oDepartamento->FechaBaja; // obtengo el valor de la fecha de baja del departamento del registro actual    ?></td>
                            <td><?php echo $oDepartamento->VolumenNegocio; // obtengo el valor de la fecha de baja del departamento del registro actual    ?></td>
                        </tr>
                        <?php
                        $oDepartamento = $resultadoConsulta2->fetchObject(); // guardo el registro actual como un objeto y avanzo el puntero al siguiente registro de la consulta 
                    }
                    ?>
                </table>    
                <?php
            } catch (PDOException $miExceptionPDO) { // Codigo que se ejecuta si hay alguna excepcion
                echo "<p style='color:red;'>ERROR EN LA CONEXION</p>";
                echo "<p style='color:red;'>Código de error: " . $miExceptionPDO->getCode() . "</p>"; // Muestra el codigo del error
                echo "<p style='color:red;'>Error: " . $miExceptionPDO->getMessage() . "</p>"; // Muestra el mensaje de error
                die(); // Finalizo el script
            } finally { // codigo que se ejecuta haya o no errores
                unset($mydb); // destruyo la variable 
            }
        } else { // si hay algun campo de la entrada que este mal muestro el formulario hasta que introduzca bien los campos
            ?> 

            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Añadir Departamento</legend>
                    <div>
                        <label for="CodDepartamento">Codigo de Departamento</label>
                        <input style="background-color:#CCF8F4;" type="text" id="CodDepartamento" name="CodDepartamento" placeholder="AAA" value="<?php
                        echo (isset($_REQUEST['CodDepartamento'])) ? $_REQUEST['CodDepartamento'] : null; // si el campo esta correcto mantengo su valor en el formulario
                        ?>">
                               <?php
                               echo ($aErrores['CodDepartamento']) ? "<span style='color:#FF0000'>" . $aErrores['CodDepartamento'] . "</span>" : ""; // si el campo es erroneo se muestra un mensaje de error
                               ?>
                    </div>
                    <div>
                        <label for="DescDepartamento">Descripcion del Departamento</label>
                        <input style="background-color:#CCF8F4;" type="text" id="DescDepartamento" name="DescDepartamento" placeholder="Introduzca Descripcion" value="<?php
                        echo (isset($_REQUEST['DescDepartamento'])) ? $_REQUEST['DescDepartamento'] : null; // si el campo esta correcto mantengo su valor en el formulario
                        ?>">
                               <?php
                               echo ($aErrores['DescDepartamento']) ? "<span style='color:#FF0000'>" . $aErrores['DescDepartamento'] . "</span>" : ""; // si el campo es erroneo se muestra un mensaje de error
                               ?>
                    </div>                
                    <div>
                        <label for="VolumenNegocio">Volumen Negocio</label>
                        <input style="background-color:#CCF8F4;" type="text" id="VolumenNegocio" name="VolumenNegocio" placeholder="Decimal" value="<?php
                        echo (isset($_REQUEST['VolumenNegocio'])) ? $_REQUEST['VolumenNegocio'] : null; // si el campo esta correcto mantengo su valor en el formulario
                        ?>">
                               <?php
                               echo(!is_null($aErrores['VolumenNegocio'])) ? "<span style='color:#FF0000'>" . $aErrores['VolumenNegocio'] . "</span>" : ""; // si el campo es erroneo se muestra un mensaje de error
                               ?>
                    </div>
                </fieldset>
                <input id="btnEnviar" type="submit" value="Insertar" name="Enviar">
            </form>

            <?php
        }
        ?>
    </body>
</html>