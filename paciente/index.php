<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Pacientes</title>
  <link href="../adi_bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .carousel-item img {
        height: 30vh; /* Altura del carrusel reducida */
        object-fit: cover;
        filter: brightness(0.6);
    }
    .btn-primary {
        background-color: #adb5bd; /* Light gray accent */
        border-color: #adb5bd; /* Light gray accent */
    }
    .btn-primary:hover {
        background-color: #6c757d; /* Darker gray on hover */
        border-color: #6c757d; /* Darker gray on hover */
    }
    .btn-warning {
        background-color: #adb5bd; /* Light gray accent */
        border-color: #adb5bd; /* Light gray accent */
        color: #212529; /* Dark text for contrast */
    }
    .btn-warning:hover {
        background-color: #6c757d; /* Darker gray on hover */
        border-color: #6c757d; /* Darker gray on hover */
        color: #e0e0e0; /* Light text on hover */
    }
  </style>
</head>
<body class="bg-dark text-light">
  <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/medico1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../img/medico2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../img/medico3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="../Home.php">Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Pacientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../especialidad/index.php">Especialidades</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Lista de Pacientes</h2>
      <div>
        <a href="create_paciente.php" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Nuevo Paciente</a>
        <a href="generar_pdf.php" target="_blank" class="btn btn-secondary"><i class="fas fa-file-pdf"></i> Generar PDF</a>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-dark table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>F. Nacimiento</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'db.php';
  
          $sql = "SELECT * FROM pacientes";
          $res = $con->query($sql);
  
          if ($res->num_rows > 0) {
              while($fila = $res->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
                  echo "<td>" . htmlspecialchars($fila["apellido"]) . "</td>";
                  echo "<td>" . htmlspecialchars($fila["fecha_nacimiento"]) . "</td>";
                  echo "<td>" . htmlspecialchars($fila["direccion"]) . "</td>";
                  echo "<td>" . htmlspecialchars($fila["telefono"]) . "</td>";
                  echo "<td>";
                  echo "<a href='edit_paciente.php?id=" . $fila["id"] . "' class='btn btn-sm btn-warning me-2'><i class='fas fa-edit'></i> Editar</a>";
                  echo "<a href='delete_paciente.php?id=" . $fila["id"] . "' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i> Eliminar</a>";
                  echo "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='6' class='text-center'>No se encontraron pacientes</td></tr>";
          }
          $con->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="../adi_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>