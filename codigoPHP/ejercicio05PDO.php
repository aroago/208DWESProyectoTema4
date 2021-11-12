


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
        <a href="../mostrarCodigo/ejercicio05PDO.php">Codigo</a>
    </div>
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
            //Crea una tabla para visualizar el contenido de la bd conectada
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
            //Captura de la excepción Es decir si hay algun error lo muestra
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