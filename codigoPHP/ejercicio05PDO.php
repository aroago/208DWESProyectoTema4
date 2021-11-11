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
        <h3>5. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones <br>
            insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno</h3>
        <?php
        require_once '../config/confDBPDO.php';
        try {
            $mydb = new PDO(HOST, USER, PASSWORD); //Establecer una conexión con la base de datos 
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            //Inicializa la transacción
            $mydb->beginTransaction();

            //Crea los tres querys de los insert
            $insert1 = $mydb->prepare('INSERT INTO Departamento (CodDepartamento, DescDepartamento , VolumenNegocio) VALUES("CAT","Departamento Gato","123")');
            $insert2 = $mydb->prepare('INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio) VALUES("PET","Departamento Animales","456")');
            $insert3 = $mydb->prepare('INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio) VALUES("DOG","Departamento Perro","789")');

            $insert1->execute();
            $insert2->execute();
            $insert3->execute();

            $mydb->commit();

            //Mensaje de salida
            echo "<h3 style='color: green'>Las inserciones se han realizado correctamente</h3>" . "<br>";
            $consultaSelect = $mydb->prepare('SELECT * FROM Departamento');
            $consultaSelect->execute();
            //Crea una tabla para introducir los datos que hay en la BBDD
            echo "<table>";
            echo "<tr>";
            echo "<th>Codigo</th>";
            echo "<th>Descripción</th>";
            echo "<th>VolumenNegocio</th>";
            echo "</tr>";
            //Al realizar el fetchObject, se pueden sacar los datos de $registro como si fuera un objeto
            while ($registro = $consultaSelect->fetchObject()) {
                echo "<tr>";
                echo "<td>$registro->CodDepartamento</td>";
                echo "<td>$registro->DescDepartamento</td>";
                echo "<td>$registro->VolumenNegocio</td>";
                echo "</tr>";
            }
            echo "</table>";
            //Captura de la excepción
        } catch (Exception $miExceptionPDO) {
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