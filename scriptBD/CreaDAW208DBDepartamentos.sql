/* Crear base de datos DAW208DBDepartamentos*/

CREATE DATABASE IF NOT EXISTS DAW208DBDepartamentos;

/* Crear el usuario adminsql / paso*/

CREATE USER IF NOT EXISTS 'adminsql'@'%' identified BY 'paso';

/* Usar base de datos DAW208DBDepartamentos*/

USE DAW202DBDepartamentos;

/* Crear tabla Departamento con los campos (PK)CodDepartamento (3 letras mayusculas), DescDepartamento (max. 255 caracteres),FechaBaja, VolumenNegocio (float-€)*/

    CREATE TABLE Departamento (
            CodDepartamento VARCHAR(3) PRIMARY KEY,
            DescDepartamento VARCHAR(255) NOT NULL,
            FechaBaja INT DEFAULT NULL,
            VolumenNegocio FLOAT DEFAULT NULL
    ) ENGINE=INNODB
/* Dar permisos al usuario adminsql*/

GRANT ALL PRIVILEGES ON DAW208DBDepartamentos.* TO 'adminsql'@'%';