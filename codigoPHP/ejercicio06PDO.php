<!DOCTYPE html>
<!--Aroa Granero Omañas 
Fecha Creacion: 11/11/2021
Fecha Modificacion: 11/11/2021 -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>ejercicio 05 PDO</title>
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


        </style>
    </head>

    <body>
        <h3>6. Pagina web que cargue registros en la tabla Departamento desde un array departamentos nuevos
            utilizando una consulta preparada</h3>
        <?php
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