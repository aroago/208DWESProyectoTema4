


<!--Aroa Granero Omañas 
Fecha Creacion: 11/11/2021
Fecha Modificacion: 11/11/2021 -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>ejercicio 08 PDO</title>
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
        <a href="../mostrarCodigo/ejercicio08PDO.php">Codigo</a>
        <a href="../../index.php">&#127968;</a>
    </div>
        <?php 
        /*
         * @author: Aroa Granero Omañas
         * @version: v1
         * Created on: 11/11/2021
         * Last modification: 11/11/2021
         */
        
        /* 8. Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
          fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
          encuentra en el directorio .../tmp/ del servidor.
          Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,
          JSON, CSV, TXT,...
          Si el alumno dispone de tiempo probar a exportar e importar  a o desde un directorio (a elegir) en
          el equipo cliente */
        //Fichero que contiene los datos de la bases de datos
        require_once '../config/confDBPDO.php';


        try {
            //objetos PDO con los datos de la conexion
            $mydb = new PDO(HOST, USER, PASSWORD); //Establecer una conexión con la base de datos 
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $consulta = 'SELECT * FROM Departamento'; //Guardamos en la variable la consulta que queremos hacer
            $resultadoConsulta = $mydb->prepare($consulta); //Preparamos la consulta
            $resultadoConsulta->execute();

            $archivoXML = new DOMDocument("1.0", "utf-8");
            $archivoXML->formatOutput = true;


            $oElemDepartamentos = $archivoXML->createElement("departamentos");
            $nodoDepartamentos = $archivoXML->appendChild($oElemDepartamentos);


            $oDepartamento = $resultadoConsulta->fetchObject();

            while($oDepartamento){
                    // Creación del elemento departamento.
                    $oElemDepartamento = $archivoXML->createElement("departamento");
                    $nodoDepartamentos->appendChild($oElemDepartamento);
                    
                    // Creación y añadido de la información sobre el departamento.
                    $oElemCodigo = $archivoXML->createElement('CodDepartamento', $oDepartamento->CodDepartamento);
                    $oElemDepartamento->appendChild($oElemCodigo);
                    
                    $oElemCodigo = $archivoXML->createElement('DescDepartamento', $oDepartamento->DescDepartamento);
                    $oElemDepartamento->appendChild($oElemCodigo);
                    
                    $oElemCodigo = $archivoXML->createElement('FechaBaja', $oDepartamento->FechaBaja);
                    $oElemDepartamento->appendChild($oElemCodigo);
                    
                    $oElemCodigo = $archivoXML->createElement('VolumenNegocio', $oDepartamento->VolumenNegocio);
                    $oElemDepartamento->appendChild($oElemCodigo);
                    
                    $oDepartamento = $resultadoConsulta->fetchObject();
                }
                
            // Guardado del archivo.
            echo"El archivo se ha rellenado con: ". $archivoXML->save('../tmp/documentoXML.xml')." bytes";
        } catch (PDOException $miExceptionPDO) {
            echo "<h1 style='color=red;'>No se pudo exportar el archivo</h1>";
            //mensaje de salida 
            echo $miExceptionPDO->getMessage();
             echo $miExceptionPDO->getCode();
        } finally {
            //Para finalizar cerramos la conexion
            unset($mydb);
        }
        ?>


    </body>
</html>
