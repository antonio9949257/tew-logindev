<?php
include 'db.php';
$message = '';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $stmt = $con->prepare("UPDATE especialidad SET nombre=? WHERE id=?");
    $stmt->bind_param("si", $nombre, $id);

    if ($stmt->execute()) {
        header("Location: index.php?status=updated");
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
    $stmt->close();
} else {
    $stmt = $con->prepare("SELECT * FROM especialidad WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $especialidad = $result->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Especialidad</title>
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
      <a class="navbar-brand" href="#">Gestión de Especialidades</a>
    </div>
  </nav>
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-secondary text-light">
          <div class="card-header">
            <h2 class="card-title mb-0"><i class="fas fa-edit"></i> Editar Especialidad</h2>
          </div>
          <div class="card-body">
            <?php echo $message; ?>
            <form action="edit_especialidad.php?id=<?php echo $id; ?>" method="post">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($especialidad['id']); ?>">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($especialidad['nombre']); ?>" required>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Actualizar Especialidad</button>
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