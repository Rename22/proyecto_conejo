<?php

// Incluir el archivo de conexión
include 'conexion.php';

// Editar conejo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $raza = $_POST['raza'];
    $genero = $_POST['genero'];
    $fecha_nac = $_POST['fecha_nac'];
    $historial_me = $_POST['historial_me'];
    $vacunas = $_POST['vacunas'];
    $color = $_POST['color'];
    $peso = $_POST['peso'];
    $observacion = $_POST['observacion'];

    $sql = "UPDATE conejos SET raza='$raza', genero='$genero', fecha_nac='$fecha_nac', historial_me='$historial_me', 
            vacunas='$vacunas', color='$color', peso=$peso, observacion='$observacion' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: registro.php?action=edited");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
