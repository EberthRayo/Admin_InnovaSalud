<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir archivo de conexión
    include 'modelo/conexion.php';

    // Obtener los datos del formulario
    $identificacion = $_POST["Identificacion"];
    $nombre_completo = $_POST["Nombre_completo"];
    $fecha_nacimiento = $_POST["Fecha_Nacimiento"];
    $genero = $_POST["Genero"];
    $direccion_residencia = $_POST["Direccion_Recidencia"];
    $numero_telefono = $_POST["Numero_Telefono"];
    $correo_electronico = $_POST["Correo_Electronico"];
    $estado_registro = $_POST["Estado_registro"];

    // Preparar la consulta SQL
    $sql = "INSERT INTO pacientes (Identificacion, Nombre_completo, Fecha_Nacimiento, Genero, Direccion_Recidencia, Numero_Telefono, Correo_Electronico, Estado_registro)
            VALUES ('$identificacion', '$nombre_completo', '$fecha_nacimiento', '$genero', '$direccion_residencia', '$numero_telefono', '$correo_electronico', '$estado_registro')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Mostrar mensaje de éxito
        echo "<script>alert('Datos ingresados correctamente.');</script>";
        
        // Redireccionar a la página principal
        echo "<script>window.location.href = 'pacientes.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
