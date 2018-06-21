------------------------------
-- Archivo de base de datos --
------------------------------


-- Tabla cursos --

DROP TABLE IF EXISTS cursos CASCADE;

CREATE TABLE cursos
(
       id          BIGSERIAL    PRIMARY KEY
    ,  nombre      VARCHAR(255) NOT NULL
    ,  acronimo    VARCHAR(255)
    ,  descripcion VARCHAR(255)
);


INSERT INTO cursos (nombre, descripcion, acronimo)
    VALUES ('Desarrollo de Aplicaciones Web', 'Descripcion de DAW', 'DAW'),
            ('Sistemas Microiformáticos y Redes', 'Descripción de SMR', 'SMR');




-- Tabla niveles --

DROP TABLE IF EXISTS niveles CASCADE;

CREATE TABLE niveles
(
       id       BIGSERIAL     PRIMARY KEY
    ,  nombre   VARCHAR(255)  NOT NULL
    ,  curso_id BIGINT        NOT NULL REFERENCES cursos (id) ON DELETE
                              NO ACTION ON UPDATE CASCADE
);


INSERT INTO niveles (nombre, curso_id)
        VALUES ('1º DAW', 1), ('2º DAW', 1), ('1º SMR', 2), ('2º SMR', 2);