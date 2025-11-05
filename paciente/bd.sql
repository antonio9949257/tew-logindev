USE bdprueba;

CREATE TABLE IF NOT EXISTS pacientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    fecha_nacimiento DATE,
    direccion VARCHAR(255),
    telefono VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS especialidad (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100)
);