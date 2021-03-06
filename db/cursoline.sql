------------------------------
-- Archivo de base de datos --
------------------------------

-- Tabla usuarios --

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios
(
       id            BIGSERIAL      PRIMARY KEY
    ,  nombre        VARCHAR(255)   NOT NULL
    ,  apellidos     VARCHAR(255)   NOT NULL
    ,  email         VARCHAR(255)   NOT NULL
    ,  password      VARCHAR(255)   NOT NULL
    ,  url_imagen    VARCHAR(255)   NOT NULL DEFAULT '/images/usuario.png'
    ,  primer_acceso TIMESTAMP(0)
    ,  ultimo_acceso TIMESTAMP(0)
    ,  ciudad        VARCHAR(255)
    ,  pais          VARCHAR(255)
    ,  descripcion   VARCHAR(255)
    ,  UNIQUE (email)
);

INSERT INTO usuarios (nombre, apellidos, email, password, url_imagen, ciudad, pais, descripcion)
    VALUES ('Óscar', 'Vega Herrera', 'oscarvegaherrera59@gmail.com', 'unodostrescuatro', default, null, default, null),
            ('Manuel', 'Cuevas Rodríguez', 'manuel.cuevas@gmail.com', 'cuevas', default, 'Sanlucar de Bda', default, 'Hola me gusta la programación' );


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
    ,  clave       VARCHAR(255)
    ,  curso_id    BIGINT       NOT NULL REFERENCES cursos (id) ON DELETE
                                NO ACTION ON UPDATE CASCADE
    ,  imagen      VARCHAR(255)

    ,  UNIQUE (nombre, curso_id)

);

INSERT INTO modulos (nombre, descripcion, clave, curso_id)
        VALUES ('Programación','Aprende a programar en JAVA','pro2018', 1),
                ('Bases de datos', 'Todo sobre las Bases de datos relacionales','badat2018' ,  1),
                ('Sistemas Informáticos', 'Gestionar y configurar sistemas informáticos','sinf2018' ,1),
                ('Desarrollo Web Servidor', 'Desarrollo Web en el lado del servidor','dwes2018' ,2),
                ('Desarrollo Web Cliente', 'Desarrollo Web en el lado del cliente','dwec2018' ,2),
                ('Aplicaciones Ofimáticas', 'Utilización de aplicaciones ofimáticas','aplof2018' ,3);



-- Tabla matriculaciones --

DROP TABLE IF EXISTS matriculaciones CASCADE;

CREATE TABLE matriculaciones
(
       id         BIGSERIAL PRIMARY KEY
    ,  modulo_id  BIGINT    NOT NULL REFERENCES modulos (id) ON DELETE
                            NO ACTION ON UPDATE CASCADE
    ,  usuario_id BIGINT    NOT NULL REFERENCES usuarios (id) ON DELETE
                            NO ACTION ON UPDATE CASCADE

    ,  UNIQUE (modulo_id, usuario_id)
);

INSERT INTO matriculaciones (modulo_id, usuario_id)
    VALUES (1, 1), (2, 1), (3, 1), (6, 2);




-- Tabla unidades --

DROP TABLE IF EXISTS unidades CASCADE;

CREATE TABLE unidades
(
       id          BIGSERIAL    PRIMARY KEY
    ,  nombre      VARCHAR(255) NOT NULL
    ,  modulo_id   BIGINT       NOT NULL REFERENCES modulos (id) ON DELETE
                                NO ACTION ON UPDATE CASCADE
);

INSERT INTO unidades (nombre, modulo_id)
    VALUES ('Unidad 1: Introducción', 1),
            ('Unidad 2: Clase y objeto', 1),
            ('Unidad 3: Definir una clase', 1);
