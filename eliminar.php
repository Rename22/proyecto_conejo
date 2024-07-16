<?php

// Incluir el archivo de conexión
include 'conexion.php';

// Eliminar conejo
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM conejos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: registro.php?action=deleted");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
