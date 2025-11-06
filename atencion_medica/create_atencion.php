<?php
include 'db.php';
$message = '';

// Fetch patients and specialties for the dropdowns
$pacientes_res = $con->query("SELECT id, nombre, apellido FROM pacientes");
$especialidades_res = $con->query("SELECT id, nombre FROM especialidad");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paciente = $_POST['id_paciente'];
    $id_especialidad = $_POST['id_especialidad'];
    $fecha_atencion = $_POST['fecha_atencion'];
    $diagnostico = $_POST['diagnostico'];
    $tratamiento = $_POST['tratamiento'];

    $stmt = $con->prepare("INSERT INTO atencion_medica (id_paciente, id_especialidad, fecha_atencion, diagnostico, tratamiento) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $id_paciente, $id_especialidad, $fecha_atencion, $diagnostico, $tratamiento);

    if ($stmt->execute()) {
        header("Location: index.php?status=success");
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Atención Médica</title>
  <link href="../adi_bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .btn-primary {
        background-color: #adb5bd; /* Light gray accent */
        border-color: #adb5bd; /* Light gray accent */
    }
    .btn-primary:hover {
        background-color: #6c757d; /* Darker gray on hover */
        border-color: #6c757d; /* Darker gray on hover */
    }
  </style>
</head>
<body class="bg-dark text-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Gestión de Atenciones Médicas</a>
    </div>
  </nav>
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-secondary text-light">
          <div class="card-header">
            <h2 class="card-title mb-0"><i class="fas fa-plus-circle"></i> Registrar Nueva Atención Médica</h2>
          </div>
          <div class="card-body">
            <?php echo $message; ?>
            <form action="create_atencion.php" method="post">
              <div class="mb-3">
                <label for="id_paciente" class="form-label">Paciente</label>
                <select class="form-control" id="id_paciente" name="id_paciente" required>
                  <option value="">Seleccione un paciente</option>
                  <?php
                  if ($pacientes_res->num_rows > 0) {
                      while($paciente = $pacientes_res->fetch_assoc()) {
                          echo "<option value='" . $paciente['id'] . "'>" . htmlspecialchars($paciente['nombre']) . " " . htmlspecialchars($paciente['apellido']) . "</option>";
                      }
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="id_especialidad" class="form-label">Especialidad</label>
                <select class="form-control" id="id_especialidad" name="id_especialidad" required>
                  <option value="">Seleccione una especialidad</option>
                  <?php
                  if ($especialidades_res->num_rows > 0) {
                      while($especialidad = $especialidades_res->fetch_assoc()) {
                          echo "<option value='" . $especialidad['id'] . "'>" . htmlspecialchars($especialidad['nombre']) . "</option>";
                      }
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="fecha_atencion" class="form-label">Fecha de Atención</label>
                <input type="date" class="form-control" id="fecha_atencion" name="fecha_atencion" required>
              </div>
              <div class="mb-3">
                <label for="diagnostico" class="form-label">Diagnóstico</label>
                <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="tratamiento" class="form-label">Tratamiento</label>
                <textarea class="form-control" id="tratamiento" name="tratamiento" rows="3" required></textarea>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Registrar Atención</button>
                <a href="index.php" class="btn btn-secondary">Volver a la lista</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../adi_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
