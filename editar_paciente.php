<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Información del Paciente</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    <div class="container form-container">
        <h1 class="title">Editar Información del Paciente</h1>
        <?php
        include 'modelo/conexion.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM pacientes WHERE Identificacion = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form action="actualizar_paciente.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['Identificacion']; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Nombre_completo">Nombre Completo:</label>
                                <input type="text" class="form-control" id="Nombre_completo" name="Nombre_completo" value="<?php echo $row['Nombre_completo']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Fecha_Nacimiento">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" id="Fecha_Nacimiento" name="Fecha_Nacimiento" value="<?php echo $row['Fecha_Nacimiento']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Genero">Género:</label>
                                <select class="form-control" id="Genero" name="Genero" required>
                                    <option value="Masculino" <?php if ($row['Genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                                    <option value="Femenino" <?php if ($row['Genero'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                                    <option value="Otro" <?php if ($row['Genero'] == 'Otro') echo 'selected'; ?>>Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Direccion_Recidencia">Dirección de Residencia:</label>
                                <input type="text" class="form-control" id="Direccion_Recidencia" name="Direccion_Recidencia" value="<?php echo $row['Direccion_Recidencia']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Numero_Telefono">Número de Teléfono:</label>
                                <input type="number" class="form-control" id="Numero_Telefono" name="Numero_Telefono" value="<?php echo $row['Numero_Telefono']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Correo_Electronico">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="Correo_Electronico" name="Correo_Electronico" value="<?php echo $row['Correo_Electronico']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Estado_registro">Estado del Registro:</label>
                                <select class="form-control" id="Estado_registro" name="Estado_registro" required>
                                    <option value="Activo" <?php if ($row['Estado_registro'] == 'Activo') echo 'selected'; ?>>Activo</option>
                                    <option value="Inactivo" <?php if ($row['Estado_registro'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="pacientes.php" class="btn btn-secondary btn-cancel">Cancelar</a>
                    </div>
                </form>
                <?php
            } else {
                echo "<p class='text-danger'>No se encontró ningún paciente con el ID proporcionado.</p>";
            }
        } else {
            echo "<p class='text-danger'>No se proporcionó el ID del paciente a editar.</p>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
