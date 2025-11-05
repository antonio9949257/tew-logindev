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

USE bdprueba;

INSERT INTO pacientes (nombre, apellido, fecha_nacimiento, direccion, telefono)
VALUES
('Armin', 'Daniel', '2025-10-22', 'La Paz', '63760096'),
('Mendieta', 'Admin', '2025-11-01', 'Antoni2gmienl', '63760096'),
('Carlos', 'Torrez', '1992-03-15', 'Cochabamba', '71548923'),
('María', 'Flores', '1988-06-10', 'Santa Cruz', '71324587'),
('Jorge', 'Mamani', '1995-01-27', 'El Alto', '76452130'),
('Lucía', 'Quispe', '2000-07-19', 'Tarija', '69874523'),
('Rodrigo', 'Fernández', '1982-09-04', 'Oruro', '72938475'),
('Paola', 'Gutiérrez', '1999-12-22', 'Potosí', '63487291'),
('Andrea', 'Rojas', '1993-11-05', 'Sucre', '76549120'),
('Miguel', 'Vargas', '1985-02-18', 'Trinidad', '75698234'),
('Sofía', 'Choque', '1998-04-30', 'Cobija', '78431209'),
('Gabriel', 'Calderón', '1990-08-16', 'La Paz', '70123456'),
('Nancy', 'Velasco', '1987-10-25', 'Santa Cruz', '75230987'),
('Luis', 'Aliaga', '1996-06-11', 'Cochabamba', '70451236'),
('Tatiana', 'López', '1994-09-20', 'Oruro', '78896412'),
('Diego', 'Sandoval', '1991-05-09', 'Tarija', '71234569'),
('Camila', 'Huanca', '2002-03-28', 'El Alto', '76589432');

INSERT INTO especialidad (nombre)
VALUES
('Cardiología'),
('Pediatría'),
('Dermatología'),
('Neurología'),
('Oftalmología'),
('Ginecología'),
('Traumatología'),
('Psiquiatría'),
('Endocrinología'),
('Urología'),
('Oncología'),
('Reumatología'),
('Otorrinolaringología'),
('Gastroenterología'),
('Medicina General'),
('Cirugía'),
('Nefrología');
