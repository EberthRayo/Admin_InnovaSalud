<?php
include 'modelo/conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre_completo = $_POST["Nombre_completo"];
    $fecha_nacimiento = $_POST["Fecha_Nacimiento"];
    $genero = $_POST["Genero"];
    $direccion_residencia = $_POST["Direccion_Recidencia"];
    $numero_telefono = $_POST["Numero_Telefono"];
    $correo_electronico = $_POST["Correo_Electronico"];
    $estado_registro = $_POST["Estado_registro"];

    // Preparar la consulta SQL de actualización
    $sql = "UPDATE pacientes 
            SET Nombre_completo=?, 
                Fecha_Nacimiento=?, 
                Genero=?, 
                Direccion_Recidencia=?, 
                Numero_Telefono=?, 
                Correo_Electronico=?, 
                Estado_registro=?
            WHERE Identificacion=?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular parámetros
        $stmt->bind_param("sssssssi", $nombre_completo, $fecha_nacimiento, $genero, $direccion_residencia, $numero_telefono, $correo_electronico, $estado_registro, $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir a pacientes.php con un mensaje de éxito
            header("Location: pacientes.php?mensaje=Paciente actualizado correctamente");
            exit();
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
