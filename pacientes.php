<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        .container mt-5 {
            margin-top: 100px; /* Ajusta según sea necesario */
        }
    </style>
</head>
<body>
    <!-- Barra de navegación lateral -->
    <div class="sidebar">
        <nav class="nav flex-column">
            <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Inicio</a>
            <a class="nav-link" href="pacientes.php"><i class="fas fa-user"></i> Pacientes</a>
            <a class="nav-link" href="medicos.php"><i class="fas fa-user-md"></i> Médicos</a>
            <a class="nav-link" href="#"><i class="far fa-calendar-alt"></i> Citas</a>
            <!-- Agrega más enlaces aquí para otras secciones de tu aplicación -->
        </nav>
    </div>

    <!-- Encabezado con información del usuario -->
    <header class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">Dashboard</a>
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
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Formulario de búsqueda -->
                    <form class="d-flex mb-3" role="search" method="GET" action="pacientes.php">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" name="query">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>

                    <!-- Botón para abrir el modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        Agregar Paciente
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Formulario de Ingreso de Pacientes</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="agregar_paciente.php" method="POST">
                                        <div class="form-group">
                                            <label for="Identificacion">Identificación:</label>
                                            <input type="number" class="form-control" id="Identificacion" name="Identificacion" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Nombre_completo">Nombre Completo:</label>
                                            <input type="text" class="form-control" id="Nombre_completo" name="Nombre_completo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Fecha_Nacimiento">Fecha de Nacimiento:</label>
                                            <input type="date" class="form-control" id="Fecha_Nacimiento" name="Fecha_Nacimiento" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Genero">Género:</label>
                                            <select class="form-control" id="Genero" name="Genero" required>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Direccion_Recidencia">Dirección de Residencia:</label>
                                            <input type="text" class="form-control" id="Direccion_Recidencia" name="Direccion_Recidencia" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Numero_Telefono">Número de Teléfono:</label>
                                            <input type="number" class="form-control" id="Numero_Telefono" name="Numero_Telefono" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="Correo_Electronico">Correo Electrónico:</label>
                                            <input type="email" class="form-control" id="Correo_Electronico" name="Correo_Electronico" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Estado_registro">Estado del Registro:</label>
                                            <select class="form-control" id="Estado_registro" name="Estado_registro" required>
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <h2 class="mb-4">Lista de Pacientes</h2>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Identificación</th>
                            <th>Nombre Completo</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Género</th>
                            <th>Dirección de Residencia</th>
                            <th>Número de Teléfono</th>
                            <th>Correo Electrónico</th>
                            <th>Estado del Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Incluir archivo de conexión
                        include 'modelo/conexion.php';

                        // Obtener término de búsqueda
                        $query = isset($_GET['query']) ? $_GET['query'] : '';

                        // Consulta SQL para buscar pacientes
                        $sql = "SELECT Identificacion, Nombre_completo, Fecha_Nacimiento, Genero, Direccion_Recidencia, Numero_Telefono, Correo_Electronico, Estado_registro 
                                FROM pacientes 
                                WHERE Identificacion LIKE ? OR 
                                      Nombre_completo LIKE ? OR 
                                      Fecha_Nacimiento LIKE ? OR 
                                      Genero LIKE ? OR 
                                      Direccion_Recidencia LIKE ? OR 
                                      Numero_Telefono LIKE ? OR 
                                      Correo_Electronico LIKE ? OR 
                                      Estado_registro LIKE ?";

                        $stmt = $conn->prepare($sql);
                        $likeQuery = "%" . $query . "%";
                        $stmt->bind_param("ssssssss", $likeQuery, $likeQuery, $likeQuery, $likeQuery, $likeQuery, $likeQuery, $likeQuery, $likeQuery);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Identificacion"] . "</td>";
                                echo "<td>" . $row["Nombre_completo"] . "</td>";
                                echo "<td>" . $row["Fecha_Nacimiento"] . "</td>";
                                echo "<td>" . $row["Genero"] . "</td>";
                                echo "<td>" . $row["Direccion_Recidencia"] . "</td>";
                                echo "<td>" . $row["Numero_Telefono"] . "</td>";
                                echo "<td>" . $row["Correo_Electronico"] . "</td>";
                                echo "<td>" . $row["Estado_registro"] . "</td>";
                                echo '<td>
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <a href="editar_paciente.php?id=' . $row["Identificacion"] . '" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="eliminar_paciente.php?id=' . $row["Identificacion"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Estás seguro de eliminar este registro?\');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No se encontraron registros</td></tr>";
                        }

                        // Cerrar conexión
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
