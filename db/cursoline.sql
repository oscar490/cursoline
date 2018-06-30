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

    ,  UNIQUE (nombre, curso_id)
);


INSERT INTO niveles (nombre, curso_id)
        VALUES ('1º DAW', 1), ('2º DAW', 1), ('1º SMR', 2), ('2º SMR', 2);




-- Table modulos --

DROP TABLE IF EXISTS modulos CASCADE;

CREATE TABLE modulos
(
       id       BIGSERIAL    PRIMARY KEY
    ,  nombre   VARCHAR(255) NOT NULL
    ,  nivel_id BIGINT       NOT NULL REFERENCES niveles (id) ON DELETE
                             NO ACTION ON UPDATE CASCADE
    ,  imagen   VARCHAR(255)

    ,  UNIQUE (nombre, nivel_id)

);

INSERT INTO modulos (nombre, nivel_id)
        VALUES ('Programación', 1), ('Bases de datos', 1), ('Desarrollo Web Servidor', 2),
                ('Desarrollo Web Cliente', 2), ('Aplicaciones Ofimáticas', 3);