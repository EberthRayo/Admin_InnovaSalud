<?php
// Incluir archivo de conexión
include 'modelo/conexion.php';

// Verificar si se ha recibido el ID del médico
if (isset($_GET['id'])) {
    $ID_Medico = $_GET['id'];

    // Preparar la consulta SQL para obtener los datos del médico
    $sql_select = "SELECT * FROM medicos WHERE ID_Medico = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("i", $ID_Medico);
    $stmt_select->execute();
    $result = $stmt_select->get_result();

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        $medico = $result->fetch_assoc();
    } else {
        echo "Médico no encontrado.";
        exit;
    }

    // Cerrar la consulta de selección
    $stmt_select->close();
} else {
    echo "ID del médico no proporcionado.";
    exit;
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Médico</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff !important;
            border-color: #007bff !important;
        }
        .btn-primary:hover {
            background-color: #0056b3 !important;
            border-color: #0056b3 !important;
        }
        .btn-cancel {
            margin-right: 10px;
        }
        .title {
            margin-bottom: 30px;
            text-align: center;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="title">Editar Médico</h1>
            <form action="actualizar_medico.php" method="post">
                <input type="hidden" name="ID_Medico" value="<?php echo $medico['ID_Medico']; ?>">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Nombres">Nombres:</label>
                        <input type="text" class="form-control" name="Nombres" value="<?php echo $medico['Nombres']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Apellidos">Apellidos:</label>
                        <input type="text" class="form-control" name="Apellidos" value="<?php echo $medico['Apellidos']; ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ID_Especialidad_M">Especialidad:</label>
                        <input type="number" class="form-control" name="ID_Especialidad_M" value="<?php echo $medico['ID_Especialidad_M']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Horario_trabajo">Horario de Trabajo:</label>
                        <input type="text" class="form-control" name="Horario_trabajo" value="<?php echo $medico['Horario_trabajo']; ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Teléfono_contacto">Teléfono de Contacto:</label>
                        <input type="text" class="form-control" name="Teléfono_contacto" value="<?php echo $medico['Teléfono_contacto']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Correo_electrónico">Correo Electrónico:</label>
                        <input type="email" class="form-control" name="Correo_electrónico" value="<?php echo $medico['Correo_electrónico']; ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Consultorio">Consultorio:</label>
                        <input type="text" class="form-control" name="Consultorio" value="<?php echo $medico['Consultorio']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Estado_disponibilidad">Estado de Disponibilidad:</label>
                        <input type="text" class="form-control" name="Estado_disponibilidad" value="<?php echo $medico['Estado_disponibilidad']; ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Actualizar Médico</button>
                        <a href="medicos.php" class="btn btn-secondary btn-cancel">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Incluir Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
