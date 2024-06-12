<?php
// Incluir archivo de conexión
include 'modelo/conexion.php';

// Verificar si se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Medico = $_POST['ID_Medico'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $ID_Especialidad_M = $_POST['ID_Especialidad_M'];
    $Horario_trabajo = $_POST['Horario_trabajo'];
    $Teléfono_contacto = $_POST['Teléfono_contacto'];
    $Correo_electrónico = $_POST['Correo_electrónico'];
    $Consultorio = $_POST['Consultorio'];
    $Estado_disponibilidad = $_POST['Estado_disponibilidad'];

    // Preparar la consulta SQL para actualizar los datos del médico
    $sql_update = "UPDATE medicos SET Nombres = ?, Apellidos = ?, ID_Especialidad_M = ?, Horario_trabajo = ?, Teléfono_contacto = ?, Correo_electrónico = ?, Consultorio = ?, Estado_disponibilidad = ? WHERE ID_Medico = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssisssssi", $Nombres, $Apellidos, $ID_Especialidad_M, $Horario_trabajo, $Teléfono_contacto, $Correo_electrónico, $Consultorio, $Estado_disponibilidad, $ID_Medico);

    if ($stmt_update->execute()) {
        // Redirigir a la página de lista de médicos con un mensaje de éxito
        header("Location: medicos.php?message=Medico%20$Nombres%20$Apellidos%20ha%20sido%20actualizado%20exitosamente");
    } else {
        // Redirigir a la página de lista de médicos con un mensaje de error
        header("Location: medicos.php?message=Error%20al%20actualizar%20el%20registro");
    }

    // Cerrar la conexión
    $stmt_update->close();
    $conn->close();
} else {
    // Redirigir a la página de lista de médicos si no se recibieron los datos del formulario
    header("Location: medicos.php");
}
exit;
?>
