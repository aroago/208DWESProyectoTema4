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
        <p>8. Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
            fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
            encuentra en el directorio .../tmp/ del servidor.
            Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,
            JSON, CSV, TXT,...
            Si el alumno dispone de tiempo probar a exportar e importar  a o desde un directorio (a elegir) en
            el equipo cliente</p>
        <?php
        //Fichero que contiene los datos de la bases de datos
        require_once '../config/confDBPDO.php';
        try{
            //objetos PDO con los datos de la conexion
        $mydb = new PDO(HOST, USER, PASSWORD); //Establecer una conexión con la base de datos 
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $miExceptionPDO){
            die("No se ha podido conectar con la Base de Datos");
        }
        try{
        $consulta = "SELECT * FROM Departamento"; //Guardamos en la variable la consulta que queremos hacer
        $resultadoConsulta = $mydb->prepare($consulta); //Preparamos la consulta
        $resultadoConsulta->execute();
        
        $archivoXML = new DOMDocument("1.0", "utf-8");
        $archivoXML -> formatOutput = true;
        
        $nodoDepartamentos = $archivoXML->appendChild($nodoDepartamentos);
        while ($oDepartamento = $consulta->fetchObject()) {
          $departamento = $raiz->appendChild($archivoXML->createElement("Departamento"));
                $departamento->appendChild($archivoXML->createElement("CodDepartamento", $oDepartamento->CodDepartamento));
                $departamento->appendChild($archivoXML->createElement("DescDepartamento", $oDepartamento->DescDepartamento));
                $departamento->appendChild($archivoXML->createElement("FechaBaja", $oDepartamento->FechaBaja));
                $departamento->appendChild($archivoXML->createElement("VolumenNegocio", $oDepartamento->VolumenNegocio));
            }
        
       
        echo $dom->saveXML();//crear un documento DOM
        $dom->save('../tmp/prueba.xml');//Establecemos la ruta donde queremos que se guarde
        } catch (PDOException $miExceptionPDO){
            echo "<h1 style='color=red;'>No se pudo exportar el archivo</h1>";
            //mensaje de salida 
            echo $miExceptionPDO->getMessage();
        } finally {
            //Para finalizar cerramos la conexion
            unset($mydb);
        }
        ?>
        
        
    </body>
</html>
