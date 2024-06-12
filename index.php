<?php
// Suponiendo que tienes un código PHP para recuperar los datos
// $num_citas_pedidas = obtener_numero_citas_pedidas();
// $num_pacientes = obtener_numero_pacientes();
// $num_medicos = obtener_numero_medicos();
// $num_citas_canceladas = obtener_numero_citas_canceladas();

// Simulando datos para demostración
$num_citas_pedidas = 50;
$num_pacientes = 200;
$num_medicos = 20;
$num_citas_canceladas = 10;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .navbar {
            background-color: #343a40;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand, .navbar-toggler-icon, .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-nav .nav-link:hover {
            color: #cccccc;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            width: 250px;
            padding-top: 60px;
        }

        .sidebar .nav-link {
            color: #ffffff;
            padding: 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }

        .dropdown-menu {
            right: 0;
            left: auto;
        }

        .stat-card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 1rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .stat-card h5 {
            margin-bottom: 0.5rem;
        }

        .stat-card .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación lateral -->
    <div class="sidebar">
        <nav class="nav flex-column">
            <a class="nav-link" href="#"><i class="fas fa-home"></i> Inicio</a>
            <a class="nav-link" href="pacientes.php"><i class="fas fa-user"></i> Pacientes</a>
            <a class="nav-link" href="medicos.php"><i class="fas fa-user-md"></i> Médicos</a>
            <a class="nav-link" href="#"><i class="far fa-calendar-alt"></i> Citas</a>
            <!-- Agrega más enlaces aquí para otras secciones de tu aplicación -->
        </nav>
    </div>

    <!-- Encabezado con información del usuario -->
    <header class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">ADMIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="container mt-5">
            <!-- Estadísticas -->
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card">
                        <h5>Citas Pedidas</h5>
                        <div class="stat-value"><?php echo $num_citas_pedidas; ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <h5>Citas Canceladas</h5>
                        <div class="stat-value"><?php echo $num_citas_canceladas; ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <h5>Pacientes</h5>
                        <div class="stat-value"><?php echo $num_pacientes; ?></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <h5>Médicos</h5>
                        <div class="stat-value"><?php echo $num_medicos; ?></div>
                    </div>
                </div>
            </div>
            <!-- Gráficas -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <canvas id="citasChart"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="usuariosChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Datos simulados
        const numCitasPedidas = <?php echo $num_citas_pedidas; ?>;
        const numPacientes = <?php echo $num_pacientes; ?>;
        const numMedicos = <?php echo $num_medicos; ?>;
        const numCitasCanceladas = <?php echo $num_citas_canceladas; ?>;

        // Configuración del gráfico de citas
        const citasCtx = document.getElementById('citasChart').getContext('2d');
        const citasChart = new Chart(citasCtx, {
            type: 'bar',
            data: {
                labels: ['Citas Pedidas', 'Citas Canceladas'],
                datasets: [{
                    label: 'Número de Citas',
                    data: [numCitasPedidas, numCitasCanceladas],
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Configuración del gráfico de usuarios
        const usuariosCtx = document.getElementById('usuariosChart').getContext('2d');
        const usuariosChart = new Chart(usuariosCtx, {
            type: 'pie',
            data: {
                labels: ['Pacientes', 'Médicos'],
                datasets: [{
                    label: 'Número de Usuarios',
                    data: [numPacientes, numMedicos],
                    backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
