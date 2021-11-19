<?php 
/*
 *Configuracion  ENTORNO EXPLOTACION 1&1
 */
?>
/* Base de datos a usar */
    USE dbs4868804;

/* Introducción de datos dentro de la tabla creada */
    INSERT INTO Departamento(CodDepartamento,DescDepartamento,FechaBaja, VolumenNegocio) VALUES
        ('INF', 'Departamento de informatica',null, 80),
        ('LEN', 'Departamento de lengua',null, 1000),
        ('ING', 'Departamento de Inglés',null, 3000),
        ('MAT', 'Departamento de matematicas',null, 2000)