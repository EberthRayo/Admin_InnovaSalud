<?php
// Incluir archivo de conexión
include 'modelo/conexion.php';

// Verificar si se ha recibido la identificación
if (isset($_GET['id'])) {
    $id_medico = $_GET['id'];

    // Obtener el nombre del médico antes de eliminarlo
    $sql_select = "SELECT CONCAT(Nombres, ' ', Apellidos) AS Nombre_completo FROM medicos WHERE ID_Medico = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("i", $id_medico);
    $stmt_select->execute();
    $stmt_select->bind_result($nombre_medico);
    $stmt_select->fetch();

    // Cerrar la consulta de selección antes de preparar la eliminación
    $stmt_select->close();

    // Preparar la consulta SQL para eliminar el registro
    $sql_delete = "DELETE FROM medicos WHERE ID_Medico = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $id_medico);

    if ($stmt_delete->execute()) {
        // Redirigir a la página de lista de médicos con un mensaje de éxito
        header("Location: medicos.php?message=El médico $nombre_medico ha sido eliminado exitosamente");
    } else {
        // Redirigir a la página de lista de médicos con un mensaje de error
        header("Location: medicos.php?message=Error al eliminar el registro");
    }

    // Cerrar la conexión
    $stmt_delete->close();
    $conn->close();
} else {
    // Redirigir a la página de lista de médicos si no se recibió la identificación
    header("Location: medicos.php");
}
exit;
?>
