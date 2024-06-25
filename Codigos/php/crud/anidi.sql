# anidi.sql

DROP DATABASE IF EXISTS anidi;
CREATE DATABASE IF NOT EXISTS anidi;

USE anidi;

# Tabla principal
CREATE TABLE Aulas (
	numAula TINYINT UNIQUE NOT NULL,
    capacidad TINYINT NOT NULL,
    docente VARCHAR(45) NOT NULL,
    hardware BOOLEAN NOT NULL,
    PRIMARY KEY PK_Aulas (numAula)
) ENGINE InnoDB;
# Tabla relacionada

CREATE TABLE Alumnos (
	nombre VARCHAR(45) UNIQUE NOT NULL,
    edad TINYINT NOT NULL,
    sexo BOOLEAN NOT NULL,
    fechanac DATE NOT NULL,
    numAula TINYINT NOT NULL,
    PRIMARY KEY PK_Alumnos (nombre),
    FOREIGN KEY FK_Alumnos_numAula (numAula)
    REFERENCES Aulas (numAula)
) ENGINE InnoDB;

# Hacemos el INSERT
INSERT INTO Aulas 
VALUES (23, 15, "Iván Rodríguez", 1);

INSERT INTO Alumnos
VALUES ("Rosa García", 20, 1, "2003-11-02", 23);







