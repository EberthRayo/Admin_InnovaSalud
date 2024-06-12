<?php
// Incluir archivo de conexión
include 'modelo/conexion.php';

// Verificar si se ha recibido la identificación
if (isset($_GET['id'])) {
    $identificacion = $_GET['id'];

    // Obtener el nombre del paciente antes de eliminarlo
    $sql_select = "SELECT Nombre_completo FROM pacientes WHERE Identificacion = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("i", $identificacion);
    $stmt_select->execute();
    $stmt_select->bind_result($nombre_paciente);
    $stmt_select->fetch();

    // Cerrar la consulta de selección antes de preparar la eliminación
    $stmt_select->close();

    // Preparar la consulta SQL para eliminar el registro
    $sql_delete = "DELETE FROM pacientes WHERE Identificacion = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $identificacion);

    if ($stmt_delete->execute()) {
        // Redirigir a la página de lista de pacientes con un mensaje de éxito
        header("Location: pacientes.php?message=Paciente $nombre_paciente ha sido eliminado exitosamente");
    } else {
        // Redirigir a la página de lista de pacientes con un mensaje de error
        header("Location: pacientes.php?message=Error al eliminar el registro");
    }

    // Cerrar la conexión
    $stmt_delete->close();
    $conn->close();
} else {
    // Redirigir a la página de lista de pacientes si no se recibió la identificación
    header("Location: pacientes.php");
}
exit;
?>