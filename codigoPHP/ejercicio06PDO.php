


<!DOCTYPE html>
<!--Aroa Granero Omañas 
Fecha Creacion: 11/11/2021
Fecha Modificacion: 11/11/2021 -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>ejercicio 06 PDO</title>
        <style>


            table{
                margin-left: auto;
                margin-right: auto;
            }
            td,tr{
                border: solid 3px cadetblue;
            }
            h3{
                color:cadetblue;
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
        <a href="../mostrarCodigo/ejercicio06PDO.php">Codigo</a>
        <a href="../../index.php">&#127968;</a>
    </div>
        <h3>6. Pagina web que cargue registros en la tabla Departamento desde un array departamentos nuevos
            utilizando una consulta preparada</h3>
        <?php
        /*
         * @author: Aroa Granero Omañas
         * @version: v1
         * Created on: 11/11/2021
         * Last modification: 11/11/2021
         */
        require_once '../config/confDBPDO.php';
        // Array con los departamentos que vamos a insertar.
        $aDepartamentos = [
            ["codDepartamento" => 'MOM', "descDepartamento" => 'Departamento MAMA', 'volumenNegocio' => 12],
            ["codDepartamento" => 'DAD', "descDepartamento" => 'Departamento PAPA', 'volumenNegocio' => 16],
            ["codDepartamento" => 'BRO', "descDepartamento" => 'Departamento HERMANO', 'volumenNegocio' => 19]
        ];
        try {
            $mydb = new PDO(HOST, USER, PASSWORD); //Establecer una conexión con la base de datos 
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consulta preparada.
            $sql = $mydb->prepare(<<<QUERY
                        INSERT INTO Departamento
                        VALUES (:codDep, :descDep, null, :volNeg);
                QUERY);

            //Inicializa la transacción
            $mydb->beginTransaction();

            // Ejecución de la consulta preparada por cada departamento.

            foreach ($aDepartamentos as $aDepartamento) {
                //Modificación de los parámetros por cada departamento.

                $aParametros = [
                    ':codDep' => $aDepartamento['codDepartamento'],
                    ':descDep' => $aDepartamento['descDepartamento'],
                    ':volNeg' => $aDepartamento['volumenNegocio']
                ];

                $sql->execute($aParametros);
            }

            echo 'Se han realizado los registros';

            $mydb->commit();
        } catch (Exception $miExceptionPDO) {//si se produce algun error
            $mydb->rollback();
            echo "<h3 style='color: red'>Error en la transacción</h3>";
            echo $$miExceptionPDO->getMessage();
        } finally {
            //Cerramos la conexion
            unset($mydb); //Se cierra la conexion
        }
        ?>
    </body>
</html>