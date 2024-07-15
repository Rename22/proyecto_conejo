CREATE DATABASE conejo_crianza;

USE conejo_crianza;

CREATE TABLE razas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT NOT NULL,
    fecha DATE NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE estadisticas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT NOT NULL,
    valor INT NOT NULL
);

CREATE TABLE videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    url VARCHAR(255) NOT NULL
);

CREATE TABLE visitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    visitante VARCHAR(100) NOT NULL,
    comentario TEXT
);

CREATE TABLE bitacora (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    evento TEXT NOT NULL
);
