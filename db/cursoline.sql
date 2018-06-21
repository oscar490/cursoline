------------------------------
-- Archivo de base de datos --
------------------------------


-- Table cursos --

DROP TABLE IF EXISTS cursos CASCADE;

CREATE TABLE cursos
(
       id          BIGSERIAL    PRIMARY KEY
    ,  nombre      VARCHAR(255) NOT NULL
    ,  descripcion VARCHAR(255)
);


INSERT INTO cursos (nombre, descripcion)
    VALUES ('Desarrollo de Aplicaciones Web', 'Descripcion de DAW'),
            ('Sistemas Microiformáticos y Redes', 'Descripción de SMR');
