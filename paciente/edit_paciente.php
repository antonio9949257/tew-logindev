<?php
include 'db.php';
$message = '';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $stmt = $con->prepare("UPDATE pacientes SET nombre=?, apellido=?, fecha_nacimiento=?, direccion=?, telefono=? WHERE id=?");
    $stmt->bind_param("sssssi", $nombre, $apellido, $fecha_nacimiento, $direccion, $telefono, $id);

    if ($stmt->execute()) {
        header("Location: index.php?status=updated");
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
    $stmt->close();
} else {
    $stmt = $con->prepare("SELECT * FROM pacientes WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $paciente = $result->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Paciente</title>
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
      <a class="navbar-brand" href="#">Gestión de Pacientes</a>
    </div>
  </nav>
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-secondary text-light">
          <div class="card-header">
            <h2 class="card-title mb-0"><i class="fas fa-edit"></i> Editar Paciente</h2>
          </div>
          <div class="card-body">
            <?php echo $message; ?>
            <form action="edit_paciente.php?id=<?php echo $id; ?>" method="post">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($paciente['id']); ?>">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($paciente['nombre']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($paciente['apellido']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($paciente['fecha_nacimiento']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo htmlspecialchars($paciente['direccion']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($paciente['telefono']); ?>" required>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Actualizar Paciente</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
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
