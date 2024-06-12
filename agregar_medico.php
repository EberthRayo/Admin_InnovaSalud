<?php
// Incluir archivo de conexión
include 'modelo/conexion.php';

// Obtener datos del formulario
$ID_Medico = $_POST['ID_Medico'];
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$ID_Especialidad_M = $_POST['ID_Especialidad_M'];
$Horario_trabajo = $_POST['Horario_trabajo'];
$Teléfono_contacto = $_POST['Teléfono_contacto'];
$Correo_electrónico = $_POST['Correo_electrónico'];
$Consultorio = $_POST['Consultorio'];
$Estado_disponibilidad = $_POST['Estado_disponibilidad'];

// Insertar datos en la tabla
$sql = "INSERT INTO medicos (ID_Medico, Nombres, Apellidos, ID_Especialidad_M, Horario_trabajo, Teléfono_contacto, Correo_electrónico, Consultorio, Estado_disponibilidad) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ississsss", $ID_Medico, $Nombres, $Apellidos, $ID_Especialidad_M, $Horario_trabajo, $Teléfono_contacto, $Correo_electrónico, $Consultorio, $Estado_disponibilidad);

if ($stmt->execute()) {
    // Redirigir a la página de médicos después de agregar el nuevo médico
    header("Location: medicos.php");
    exit(); // Asegurarse de que el script se detenga después de la redirección
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
