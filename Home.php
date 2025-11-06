<?php
session_start();

// Simulando un usuario para demostración si no hay sesión
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = 'Invitado';
}

$nomUsu = htmlspecialchars($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Árbol de Seda</title>
    <link href="./adi_bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }
        .navbar {
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }
        .carousel-item img {
            height: 30vh; /* Altura del carrusel reducida */
            object-fit: cover;
            filter: brightness(0.6);
        }
        .welcome-card {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/prin_medico.jpg) no-repeat center center;
            background-size: cover;
            border: none;
            box-shadow: 0 8px 16px rgba(0,0,0,0.5);
        }
        .card-link {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .card-link:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.7);
        }
        .footer {
            background-color: #1f1f1f;
            padding: 20px 0;
            margin-top: 40px;
            border-top: 1px solid #333;
        }
    </style>
</head>
<body>

<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/medico1.jpg" class="d-block w-100" alt="Doctor con estetoscopio">
      <div class="carousel-caption d-none d-md-block">
        <h5>Atención Profesional</h5>
        <p>Contamos con un equipo de médicos altamente calificados.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/medico2.jpg" class="d-block w-100" alt="Sala de operaciones">
      <div class="carousel-caption d-none d-md-block">
        <h5>Tecnología de Punta</h5>
        <p>Instalaciones modernas y equipos de última generación.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/medico3.jpg" class="d-block w-100" alt="Doctora sonriendo">
      <div class="carousel-caption d-none d-md-block">
        <h5>Calidez Humana</h5>
        <p>Su bienestar es nuestra prioridad.</p>
      </div>
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
          <a class="nav-link" href="#">Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./paciente/index.php">Pacientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./especialidad/index.php">Especialidades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./atencion_medica/index.php">Atención Médica</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-5">
    <div class="p-5 mb-4 rounded-3 welcome-card">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-5 fw-bold">Bienvenido, <?php echo $nomUsu; ?></h1>
            <p class="fs-4">Gracias por confiar en la Clínica Salud. Estamos aquí para servirle.</p>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-6 mb-4">
            <a href="./paciente/index.php" class="text-decoration-none text-white">
                <div class="card bg-dark card-link h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h5 class="card-title">Gestión de Pacientes</h5>
                        <p class="card-text">Administre la información de nuestros pacientes.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 mb-4">
            <a href="./especialidad/index.php" class="text-decoration-none text-white">
                <div class="card bg-dark card-link h-100">
                    <div class="card-body">
                        <i class="fas fa-stethoscope fa-3x mb-3"></i>
                        <h5 class="card-title">Gestión de Especialidades</h5>
                        <p class="card-text">Consulte y administre las especialidades médicas.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<footer class="footer text-white">
    <div class="container text-center">
        <p>&copy; 2025 Clínica Salud. Todos los derechos reservados.</p>
        <p>
            <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
        </p>
    </div>
</footer>

<script src="./adi_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
