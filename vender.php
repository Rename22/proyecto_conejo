<?php
// Configurar la zona horaria
date_default_timezone_set('America/Guayaquil');

// Incluir el archivo de conexión
include 'conexion.php';

// Vender conejo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $precio = $_POST['precio'];
    $fecha_venta = date('Y-m-d H:i:s');

    $sql = "UPDATE conejos SET estado='No Disponible', precio=$precio, fecha_venta='$fecha_venta' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ventas.php?success=1");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
