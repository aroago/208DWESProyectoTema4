


<!--Aroa Granero Omañas 
Fecha Creacion: 14/11/2021
Fecha Modificacion: 15/11/2021 -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>ejercicio 07 PDO</title>
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
         * Created on: 14/11/2021
         * Last modification: 15/11/2021
         */
        
        /* 7. Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
         *Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
         *directorio .../tmp/ del servidor.
         */
        require_once '../config/confDBPDO.php';
         try {
            //objetos PDO con los datos de la conexion
            $mydb = new PDO(HOST, USER, PASSWORD); //Establecer una conexión con la base de datos 
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Insertamos los datos del archibo xml.
            $consulta = <<<SQL
                        INSERT INTO Departamento VALUES
                        (:CodDepartamento, :DescDepartamento, :FechaBaja, :VolumenNegocio);
                        SQL;; 
            $resultadoConsulta = $mydb->prepare($consulta); //Preparamos la consulta
            $mydb->beginTransaction();//Comenzamos la transacion
            
            
            $archivoXML = new DOMDocument("1.0", "utf-8");//creamos el DOMdocument
            $archivoXML->formatOutput = true;//Asignams el formato del documento a true

            
            $resultadoConsulta->execute();//ejecutamos la consulta
            
         } catch (PDOException $miExceptionPDO){
             $mydb->rollBack();//si exixsten errores se revierten todos los ambios realizados
             echo "<h1 style='color=red;'>No se pudo exportar el archivo</h1>";
            //mensaje de salida 
            echo $miExceptionPDO->getMessage();
             echo $miExceptionPDO->getCode();
         }
        ?>
    </body>
</html>

