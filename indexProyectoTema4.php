<!DOCTYPE html>
<!--Aroa Granero Oma�as 
Fecha Creacion: 13/10/2021
Fecha Modificacion: 22/11/2021 -->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="aroaGraneroOma�as">
        <meta name="application-name" content="Sitio web de DAW2">
        <meta name="description" content="Inicio de la pagina web">
        <meta name="keywords" content=" index" >
        <meta name="robots" content="index, follow" />
        <link href="./webroot/css/estilos.css"  rel="stylesheet"  type="text/css" title="Default style">
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AroaGO</title>
    </head>
    <body>
        <header>
            <h1>AROA G.O TEMA 4</h1>
        </header>
        <main>

            <table>
                <tr>
                    <td><p>Fichero CrearBD<p></td>
                     <td colspan="4">
                         <a href="./mostrarCodigo/mostrarCrearExplotacion.php"><img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    <td>
                </tr>
                <tr>
                    <td><p>Fichero CargaBD</p></td>
                     <td colspan="4">
                         <a href="./mostrarCodigo/mostrarCargaInicialExplotacion.php"><img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    <td>
                </tr>
                <tr>
                    <td><p>Fichero BorrarBD<p></td>
                     <td colspan="4">
                         <a href="./mostrarCodigo/mostrarBorrarExplotacion.php"><img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                     <td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">PDO</td>
                    <td colspan="2">MySQLi</td>
                </tr>
                <tr>
                    <td>EJERCICIOS</td>
                    <td>PLAY</td>
                    <td>CODIGO</td>
                    <td>PLAY</td>
                    <td>CODIGO</td>
                </tr>
                <tr>
                    <td><p>1.Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</p></td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio01PDO.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio01PDO.php"><img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio01MySQLi.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio01MySQLi.php"> <img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>
                </tr>
                <tr>
                    <td><p>2. Mostrar el contenido de la tabla Departamento y el número de registros.</p></td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio02PDO.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio02PDO.php"> <img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio02MySQLi.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio02MySQLi.php"> <img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>
                </tr>

                <tr>
                    <td><p>3. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</p></td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio03PDO.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio03PDO.php"> <img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>

                </tr>
                <tr>
                    <td><p>4. Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).
                        </p>
                    </td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio04PDO.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio04PDO.php"> <img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>

                </tr>
                <tr>
                    <td><p>5. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
                            insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno</p>
                    </td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio05PDO.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio05PDO.php"> <img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>

                </tr>
                <tr>
                    <td><p>6. Pagina web que cargue registros en la tabla Departamento desde un array departamentos nuevos
                            utilizando una consulta preparada</p>
                    </td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio06PDO.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio06PDO.php"> <img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>

                </tr>
                <tr>
                    <td><p>7. Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
                            Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
                            directorio .../tmp/ del servidor.</p>
                    </td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio07PDO.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio07PDO.php"> <img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>

                </tr>
                <tr>
                    <td><p>8. Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
                            fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
                            encuentra en el directorio .../tmp/ del servidor.
                            Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,
                            JSON, CSV, TXT,...
                            Si el alumno dispone de tiempo probar a exportar e importar  a o desde un directorio (a elegir) en
                            el equipo cliente</p>
                    </td>
                    <td class="hecho">
                        <a href="./codigoPHP/ejercicio08PDO.php"><img class="img" alt="Play" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a href="./mostrarCodigo/ejercicio08PDO.php"> <img class="img" alt="Codigo" src="./webroot/img/codigo.png" /></a>
                    </td>
                </tr>

                <tr>
                    <td><p>9. Aplicación resumen MtoDeDepartamentosTema4. (Incluir PHPDoc y versionado en el repositorio GIT)</p></td>
                    <td class="no_hecho">
                        <a href="../208DWESMtoDepartamentosTema4/indexProyectoMtoDepartamento.php"><img class="img" alt="Play" target="_blank" src="./webroot/img/play.png" /></a></td>
                    <td>
                        <a type="application/github" href="https://github.com/aroago/208DWESMtoDepartamentosTema4.git" target="_blank">
                            <img class="iconoIMG" alt="gitHub" src="./webroot/img/github.png" />
                        </a>
                    </td>
                </tr>
            </table>
        </main>
        <footer id="footerP">
            <p>&copy;2021 Todos los derechos reservados AroaGO</p>
            <div id="iconos">
                <a type="application/github" href="https://github.com/aroago/208DWESProyectoTema4.git" target="_blank">
                    <img class="iconoIMG" alt="gitHub" src="./webroot/img/github.png" />
                </a>
            </div>
        </footer>
    </body>
</html>
