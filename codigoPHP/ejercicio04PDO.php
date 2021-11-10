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
            
        </style>
    </head>

    <body>
      <h2>Formulario e inserccion de datos en tabla</h2>
        <?php
        require_once '../core/210322ValidacionFormularios.php'; // incluyo la libreria de validacion para validar los campos de formulario
        require_once '../config/confDBPDO.php';

        define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorios
       

        $entradaOK = true; // declaro la variable que determina si esta bien la entrada de los campos introducidos por el usuario


        $aRespuestas = [// declaro e inicializo el array de las respuestas del usuario
           'DescDepartamento' => null,
        ];



        if (isset($_REQUEST["Enviar"])) { // compruebo que el usuario le ha dado a al boton de enviar y valido la entrada de todos los campos
           
                try { // Bloque de código que puede tener excepciones en el objeto PDO
                    $mydb = new PDO(HOST, USER, PASSWORD); // creo un objeto PDO con la conexion a la base de datos

                    $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establezco el atributo para la apariciopn de errores y le pongo el modo para que cuando haya un error se lance una excepcion
                    
                    //Con Where en la consulta
                 
                    $sql = "SELECT * FROM Departamento WHERE DescDepartamento='{$_REQUEST['DescDepartamento']}'";
                    $consulta = $mydb->prepare($sql);
                    $consulta->execute();
                    //Si la consulta devuelve algún valor es porque el código está duplicado, da error
                    if ($consulta->rowCount() == 0) {
                        echo "No se ha encontrado ningún departamento con esa descripción";
                    }else {
                    echo "<table border='0'>";
                    echo "<tr>";
                    echo "<th>Codigo</th>";
                    echo "<th>Descripción</th>";
                    echo "<th>Volumen de Negocio</th>";
                    echo "</tr>";
                    //Al realizar el fetchObject, se pueden sacar los datos de $registro como si fuera un objeto
                    while ($registro = $sql->fetchObject()) { 
                        echo "<tr>";
                        echo "<td>$registro->CodDepartamento</td>";
                        echo "<td>$registro->DescDepartamento</td>";
                        echo "<td>$registro->VolumenNegocio</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                } catch (PDOException $miExceptionPDO) { // Codigo que se ejecuta si hay alguna excepcion
                    echo "<p style='color:red;'>ERROR</p>";
                    echo "<p style='color:red;'>Código de error: " . $miExceptionPDO->getCode() . "</p>"; // Muestra el codigo del error
                    echo "<p style='color:red;'>Error: " . $miExceptionPDO->getMessage() . "</p>"; // Muestra el mensaje de error
                    die();
                } finally {
                    unset($mydb); // destruyo la variable de la conexion a la base de datos
                }
            } else { // si hay algun campo de la entrada que este mal muestro el formulario hasta que introduzca bien los campos
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

            <?php
        }
        ?>
    </body>
</html>
