<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Registro de Nuevas Razas</h1>
    <form action="registros.php" method="post">
        <label for="raza">Nombre de la Raza:</label>
        <input type="text" id="raza" name="raza">
        <input type="submit" value="Registrar">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $raza = $_POST['raza'];
        $sql = "INSERT INTO razas (nombre) VALUES ('$raza')";
        if ($conn->query($sql) === TRUE) {
            echo "Nueva raza registrada con éxito";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
