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


        </style>
    </head>

    <body>

        <?php
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
            
            $consulta = "SELECT * FROM Departamento"; //Guardamos en la variable la consulta que queremos hacer
            $resultadoConsulta = $mydb->prepare($consulta); //Preparamos la consulta
            $resultadoConsulta->execute();

            $archivoXML = new DOMDocument("1.0", "utf-8");
            $archivoXML->formatOutput = true;


            $oDepartamentos = $archivoXML->createElement("departamentos");
            $nodoDepartamentos = $archivoXML->appendChild($oDepartamentos);


            $oDepartamento = $resultadoConsulta->fetchObject();

            while ($oDepartamento) {
                // Creación del elemento departamento.
                $oDepartamento = $archivoXML->createElement("departamento");
                $nodoDepartamentos->appendChild($oDepartamento);

                // Creación y añadido de la información sobre el departamento.
                $oElemCodigo = $archivoXML->createElement('codDepartamento', $oDepartamento->codDepartamento);
                $oDepartamento->appendChild($oElemCodigo);

                $oElemCodigo = $archivoXML->createElement('descDepartamento', $oDepartamento->descDepartamento);
                $oDepartamento->appendChild($oElemCodigo);

                $oElemCodigo = $archivoXML->createElement('fechaBaja', $oDepartamento->fechaBaja);
                $oDepartamento->appendChild($oElemCodigo);

                $oElemCodigo = $archivoXML->createElement('volumenNegocio', $oDepartamento->volumenNegocio);
                $oDepartamento->appendChild($oElemCodigo);

                $oDepartamento = $resultadoConsulta->fetchObject();
            }
              $timestamp = new DateTime();//creamos el timeStamp para el nombre del fichero.
            // Guardado del archivo.
            echo"El archivo seha rellenado con: ". $archivoXML->save('../tmp/'.$timestamp->getTimestamp().'.xml')." bytes";
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
