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
        $mydb = new PDO(HOST, USER, PASSWORD); //Establecer una conexión con la base de datos 
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT * FROM Departamento"; //Guardamos en la variable la consulta que queremos hacer
        $resultadoConsulta = $mydb->prepare($consulta); //Preparamos la consulta
        $resultadoConsulta->execute();
        
        $archivoXML = new DOMDocument("1.0", "utf-8");
        $archivoXML -> formatOutput = true;
        
        $nodoDepartamentos = $archivoXML->appendChild($nodoDepartamentos);
        while ($registrosDepartamento) {
           
        }
        
        $xml = "</ejemplo>";
        $sxe = new SimpleXMLElement($xml);
        $dom = new DOMDocument('1,0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($sxe->asXML());
        echo $dom->saveXML();
        $dom->save('../tmp/prueba.xml');
        ?>
        ?>
    </body>
</html>
