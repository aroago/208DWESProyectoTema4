/* Base de datos a usar */
    USE DAW208DBDepartamentos;

/* Introducción de datos dentro de la tabla creada */
    INSERT INTO Departamento(CodDepartamento,DescDepartamento,FechaBaja, VolumenNegocio) VALUES
        ('INF', 'Departamento de informatica',null, 80),
        ('LEN', 'Departamento de lengua',null, 1000),
        ('ING', 'Departamento de ingles',null, 3000),
        ('MAT', 'Departamento de matematicas',null, 2000)