------------------------------
-- Archivo de base de datos --
------------------------------

-- Tabla usuarios --

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios
(
       id        BIGSERIAL    PRIMARY KEY
    ,  nombre    VARCHAR(255) NOT NULL
    ,  apellidos VARCHAR(255) NOT NULL
    ,  email     VARCHAR(255) NOT NULL
    ,  password  VARCHAR(255) NOT NULL
    ,  token_act VARCHAR(255)
    ,  token_rec VARCHAR(255)
    ,  UNIQUE (email)
);

INSERT INTO usuarios (nombre, apellidos, email, password)
    VALUES ('Óscar', 'Vega Herrera', 'oscarvegaherrera59@gmail.com', 'unodostrescuatro');


-- Tabla cursos --

DROP TABLE IF EXISTS cursos CASCADE;

CREATE TABLE cursos
(
       id          BIGSERIAL    PRIMARY KEY
    ,  nombre      VARCHAR(255) NOT NULL
    ,  descripcion VARCHAR(255)
);


INSERT INTO cursos (nombre, descripcion)
    VALUES ('1º Desarrollo de Aplicaciones Web', 'Descripcion de 1ª DAW'),
           ('2º Desarrollo de Aplicaciones Web', 'Descripción de 2º DAW'),
            ('1º Sistemas Microiformáticos y Redes', 'Descripción de 1ª SMR');




-- Table modulos --

DROP TABLE IF EXISTS modulos CASCADE;

CREATE TABLE modulos
(
       id          BIGSERIAL    PRIMARY KEY
    ,  nombre      VARCHAR(255) NOT NULL
    ,  descripcion VARCHAR(255)
    ,  curso_id    BIGINT       NOT NULL REFERENCES cursos (id) ON DELETE
                                NO ACTION ON UPDATE CASCADE
    ,  imagen      VARCHAR(255)

    ,  UNIQUE (nombre, curso_id)

);

INSERT INTO modulos (nombre, descripcion, curso_id)
        VALUES ('Programación','Aprende a programar en JAVA',  1), 
                ('Bases de datos', 'Todo sobre las Bases de datos relacionales', 1),
                ('Sistemas Informáticos', 'Gestionar y configurar sistemas informáticos', 1),
                ('Desarrollo Web Servidor', 'Desarrollo Web en el lado del servidor', 2),
                ('Desarrollo Web Cliente', 'Desarrollo Web en el lado del cliente', 2), 
                ('Aplicaciones Ofimáticas', 'Utilización de aplicaciones ofimáticas', 3);