USE bdprueba;

CREATE TABLE IF NOT EXISTS atencion_medica (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_paciente INT,
    id_especialidad INT,
    fecha_atencion DATE,
    diagnostico VARCHAR(255),
    tratamiento VARCHAR(255),
    FOREIGN KEY (id_paciente) REFERENCES pacientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_especialidad) REFERENCES especialidad(id) ON DELETE CASCADE
);

INSERT INTO atencion_medica (id_paciente, id_especialidad, fecha_atencion, diagnostico, tratamiento)
VALUES
(1, 1, '2025-11-10', 'Hipertensión arterial', 'Dieta baja en sodio y ejercicio regular.'),
(2, 2, '2025-11-11', 'Resfriado común', 'Reposo y líquidos.'),
(4, 4, '2025-11-13', 'Migraña crónica', 'Analgésicos y evitar desencadenantes.'),
(5, 5, '2025-11-14', 'Miopía', 'Lentes correctivos.');
