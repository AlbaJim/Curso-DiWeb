/* examen.sql */
DROP DATABASE IF EXISTS islantilla;
CREATE DATABASE IF NOT EXISTS islantilla;

USE islantilla;
CREATE TABLE reservas (
	id INT UNIQUE NOT NULL,
    cliente VARCHAR(50) NOT NULL,
    entrada DATE NOT NULL,
    salida DATE NOT NULL,
    hab INT NOT NULL,
    pagado BOOLEAN NOT NULL,
    importe FLOAT NOT NULL,
    PRIMARY KEY PK_reservas_id (id)
)ENGINE InnoDB; 

INSERT INTO reservas 
VALUES (1, "Iván Rodríguez", "2024-02-28", "2024-03-03", 120, 1, 360);  



