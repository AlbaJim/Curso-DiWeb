/* LaLiga.sql */

/* 1. Borrar la Base de datos */
DROP DATABASE IF EXISTS LaLiga;

/* 2. Crear la BBDD */
CREATE DATABASE IF NOT EXISTS LaLiga
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish_ci;

USE LaLiga;

/* 3. Crear tabla Clubes (principal) */
DROP TABLE IF EXISTS Clubes;
CREATE TABLE IF NOT EXISTS Clubes
(
	cif CHAR(9) UNIQUE NOT NULL,
    nombre VARCHAR(45) UNIQUE NOT NULL,
    fundacion YEAR NOT NULL,
    num_socios MEDIUMINT,
    estadio VARCHAR(45) NOT NULL,
    activo BOOLEAN DEFAULT 1,
    PRIMARY KEY PK_Clubes (cif),
    INDEX IDX_Clubes_nombre (nombre)
) ENGINE InnoDB
COMMENT "Tabla Principal Clubes";

/* 4. Crear tabla Posiciones (Principal) */
CREATE TABLE IF NOT EXISTS Posiciones
(
	idPosicion TINYINT NOT NULL AUTO_INCREMENT,
    posicion VARCHAR(45) NOT NULL,
    PRIMARY KEY PK_Posiciones (idPosicion)
) ENGINE InnoDB
COMMENT "Tabla Principal Posiciones";

/* 5. Crear tabla Jugadores */
DROP TABLE IF EXISTS Jugadores;
CREATE TABLE IF NOT EXISTS Jugadores
(
	nif_nie CHAR(9) UNIQUE NOT NULL,
    nombre VARCHAR(45) UNIQUE NOT NULL,
    edad TINYINT NOT NULL,
    cedido BOOLEAN NOT NULL DEFAULT 0,
    ficha DECIMAL(8,2),
    Clubes_cif CHAR(9) NOT NULL,
    Posiciones_idPosicion TINYINT NOT NULL,
    PRIMARY KEY PK_Jugadores (nif_nie),
    INDEX IDX_Jugadores_nombre (nombre),
    FOREIGN KEY FK_Jugadores_idPosicion 
    (Posiciones_idPosicion)
	REFERENCES Posiciones 
    (idPosicion),
    FOREIGN KEY FK_Jugadores_cif (Clubes_cif)
	REFERENCES Clubes (cif)
	ON UPDATE CASCADE
) ENGINE InnoDB
COMMENT "Tabla Secundaria Jugadores";


/* 6. Crear tabla Entrenadores */
DROP TABLE IF EXISTS Entrenadores;
CREATE TABLE IF NOT EXISTS Entrenadores
(
	nif_nie CHAR(9) UNIQUE NOT NULL,
    nombre VARCHAR(45) UNIQUE NOT NULL,
    edad TINYINT NOT NULL,
    destituido BOOLEAN NOT NULL DEFAULT 0,
    ficha DECIMAL(8,2),
    Clubes_cif CHAR(9) NOT NULL,
    PRIMARY KEY PK_Entrenadores (nif_nie),
    INDEX IDX_Entrenadores_nombre (nombre),
    FOREIGN KEY FK_Entrenadores_cif (Clubes_cif)
	REFERENCES Clubes (cif)
	ON UPDATE CASCADE
) ENGINE InnoDB
COMMENT "Tabla Secundaria Entrenadores";


/* 7. Tabla Partidos (secundaria) */
CREATE TABLE IF NOT EXISTS Partidos
(
	Clubes_cif_local CHAR(9) NOT NULL,
    Clubes_cif_visitante CHAR(9) NOT NULL,
	fecha DATE NOT NULL,
    goles_local TINYINT NOT NULL,
    goles_visitantes TINYINT NOT NULL,
    arbitro VARCHAR(45) NOT NULL,
    PRIMARY KEY PK_Partidos (Clubes_cif_local, Clubes_cif_visitante),
    FOREIGN KEY FK_Partidos_cif_local (Clubes_cif_local)
	REFERENCES Clubes (cif)
	ON UPDATE CASCADE,
	FOREIGN KEY FK_Partidos_cif_visitante (Clubes_cif_visitante)
	REFERENCES Clubes (cif)
	ON UPDATE CASCADE
) ENGINE InnoDB
COMMENT "Tabla Secundaria Partidos";


/* -------------------------------------  */
/* INSERTAR DATOS (INSERT)				  */
/* -------------------------------------  */

/* 1. Clubes */
INSERT INTO Clubes 
VALUES
("Z11111111",  "Real Betis", 1907, 61000, "Benito Villamarin", 1),
("ASEGUNDA1",  "Sevilla FC", 1905, 40000, "Ramón Sanchez Pizjuan", 1),
("R22222222",  "Real Madrid", 1903, 80000, "Santiago Bernabeu", 1);

USE LaLiga;

/* 2. Posiciones */
INSERT INTO Posiciones (posicion)
VALUES 
("Portero"),
("Defensa"),
("Centrocampista"),
("Delantero");

/* 3. Jugadores */
INSERT INTO Jugadores 
VALUES
("12345678A", "Borja Iglesias", 31, 0, 200000, "Z11111111", 4),
("23456789B", "Jesús Navas", 37, 0, 200000, "ASEGUNDA1", 2);

/* 4. Entrenadores */
INSERT INTO Entrenadores 
(nif_nie, nombre, edad, ficha, Clubes_cif)
VALUES
("34567890C", "Manuel Pellegrini", 70, 650000, "Z11111111"),
("45678912D", "Quique Sanchez", 56, 350000, "ASEGUNDA1");

/* 5. Partidos */
INSERT INTO Partidos
VALUES
("ASEGUNDA1", "Z11111111", "2023-11-12", 1, 1, "Jesús Gil");

/* -------------------------------------  */
/* CONSULTAR DATOS (SELECT) 			  */
/* -------------------------------------  */

/* 1. Consulta general */
SELECT * 
FROM Clubes;

/* 2. Consulta por campos */
SELECT nombre, edad, ficha 
FROM Jugadores;

/* 3. Consulta con filtros */
SELECT nombre, edad
FROM Entrenadores
WHERE edad > 60;

/* 4. Consulta con filtros múltiples (AND)*/
SELECT * FROM Jugadores
WHERE edad > 30
AND ficha > 150000;

/* 5. Consulta con filtros múltiples (OR) */
SELECT nif_nie, nombre, edad 
FROM Entrenadores
WHERE edad > 60
OR destituido = 1;


/* -------------------------------------  */
/* ACTUALIZAR DATOS (UPDATE) 			  */
/* -------------------------------------  */

USE LaLiga;

/* Actualización sencilla */
UPDATE Entrenadores
SET destituido = 1
WHERE nombre = "Quique Sanchez";

/* Actualización campos múltiples */
UPDATE Jugadores
SET edad = 32,
ficha = 250000
WHERE nombre = "Borja Iglesias";


/* -------------------------------------  */
/* BORRADO (DELETE)		     			  */
/* -------------------------------------  */

/* Borrado lógico */
/* Hay un campo booleano que cambia de estado */
UPDATE Clubes
SET Activo = 0
WHERE nombre = "Sevilla FC";

/* Borrado Físico */
/* MUY IMPORTANTE: NO OLVIDAR EL WHERE, QUE EXPLOOOOTTAAAA!!!*/
DELETE FROM Jugadores
WHERE nombre = "Borja Iglesias";


/* -------------------------------------  */
/* JOINS (Consultas Multitabla)	          */
/* -------------------------------------  */

SELECT nombre, edad, posicion
FROM Jugadores, Posiciones
WHERE Posiciones_idPosicion = idPosicion;

/* Usando JOIN */
SELECT nombre, edad, posicion
FROM Jugadores
JOIN Posiciones
ON Posiciones_idPosicion = idPosicion;

/* Usando INNER JOIN */
SELECT nombre, edad, posicion
FROM Jugadores
INNER JOIN Posiciones
ON Posiciones_idPosicion = idPosicion;










