<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Insertar nuevo conejo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $raza = $_POST['raza'];
    $genero = $_POST['genero'];
    $fecha_nac = $_POST['fecha_nac'];
    $historial_me = $_POST['historial_me'];
    $vacunas = $_POST['vacunas'];
    $color = $_POST['color'];
    $peso = $_POST['peso'];
    $observacion = $_POST['observacion'];
    $estado = "Disponible";

    $sql = "INSERT INTO conejos (raza, genero, fecha_nac, historial_me, vacunas, color, peso, observacion, estado)
            VALUES ('$raza', '$genero', '$fecha_nac', '$historial_me', '$vacunas', '$color', $peso, '$observacion', '$estado')";

    if ($conn->query($sql) === TRUE) {
        header("Location: registro.php?action=registered");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener conejos de la base de datos
$sql = "SELECT * FROM conejos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BugsBunny</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Bugs</span>Bunny</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Horario de Atención</h6>
                        <p class="m-0">8.00AM - 9.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Correo</h6>
                        <p class="m-0">bugsbunny@gmail.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Celular</h6>
                        <p class="m-0">0985632578</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Bugs</span>Bunny</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.html" class="nav-item nav-link ">Crianza</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">Ventas</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="ventas.php" class="dropdown-item">Vender</a>
                            <a href="registro_ventas.php" class="dropdown-item">Registro de ventas</a>
                        </div>
                    </div>
                    <a href="registro.php" class="nav-item nav-link active">Registros</a>
                    <a href="price.html" class="nav-item nav-link">Estadistica</a>
                    <a href="videos.html" class="nav-item nav-link">Videos</a>
                    <a href="blog.html" class="nav-item nav-link ">Bitacora</a>
                    <a href="contact.html" class="nav-item nav-link">Contactanos</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Pagina principal -->
    <div class="container mt-5">
        <!-- Botón de Registro -->
        <button type="button" class="btn btn-primary zoom-button" data-toggle="modal" data-target="#registerModal">
            Registrar Conejo
        </button>
        <br>
        <br>
        <!-- Campo de búsqueda -->
        <input type="text" id="searchInput" class="form-control w-75 light-table-filter" data-table="order-table" placeholder="Buscar conejos...">

        <h2 class="mt-5">Lista de Conejos</h2>
        <table class="table table-bordered order-table" id="conejosTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Raza</th>
                    <th>Género</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Historial Médico</th>
                    <th>Vacunas</th>
                    <th>Color</th>
                    <th>Peso (kg)</th>
                    <th>Observación</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $estadoClass = $row['estado'] == 'Disponible' ? 'badge badge-success' : 'badge badge-danger';
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['raza']}</td>
                            <td>{$row['genero']}</td>
                            <td>{$row['fecha_nac']}</td>
                            <td>{$row['historial_me']}</td>
                            <td>{$row['vacunas']}</td>
                            <td>{$row['color']}</td>
                            <td>{$row['peso']} kg</td>
                            <td>{$row['observacion']}</td>
                            <td><span class='{$estadoClass}'>{$row['estado']}</span></td>
                            <td>";
                        if ($row['estado'] == 'Disponible') {
                            echo "<div class='btn-group' role='group'>
                                    <button class='btn btn-warning btn-sm mr-2 zoom-button' data-toggle='modal' data-target='#editModal' 
                                            data-id='{$row['id']}' data-raza='{$row['raza']}' data-genero='{$row['genero']}'
                                            data-fecha_nac='{$row['fecha_nac']}' data-historial_me='{$row['historial_me']}'
                                            data-vacunas='{$row['vacunas']}' data-color='{$row['color']}'
                                            data-peso='{$row['peso']}' data-observacion='{$row['observacion']}'>Editar</button>
                                    <a href='eliminar.php?id={$row['id']}' class='btn btn-danger btn-sm zoom-button'>Eliminar</a>
                                  </div>";
                        }
                        echo "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No hay conejos registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de Registro -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Registrar Conejo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="registerForm" method="post" action="registro.php">
                        <input type="hidden" name="register" value="1">
                        <!-- Campos del formulario -->
                        <div class="form-group">
                            <label for="raza">Raza</label>
                            <input type="text" class="form-control" id="raza" name="raza" required>
                        </div>
                        <div class="form-group">
                            <label for="genero">Género</label>
                            <select class="form-control" id="genero" name="genero" required>
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nac">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                        </div>
                        <div class="form-group">
                            <label for="historial_me">Historial Médico</label>
                            <textarea class="form-control" id="historial_me" name="historial_me" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="vacunas">Vacunas</label>
                            <textarea class="form-control" id="vacunas" name="vacunas" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                        <div class="form-group">
                            <label for="peso">Peso (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="peso" name="peso" required>
                        </div>
                        <div class="form-group">
                            <label for="observacion">Observación</label>
                            <textarea class="form-control" id="observacion" name="observacion" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Conejo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" action="editar.php">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="form-group">
                            <label for="edit-raza">Raza</label>
                            <input type="text" class="form-control" id="edit-raza" name="raza" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-genero">Género</label>
                            <select class="form-control" id="edit-genero" name="genero" required>
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-fecha_nac">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="edit-fecha_nac" name="fecha_nac" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-historial_me">Historial Médico</label>
                            <textarea class="form-control" id="edit-historial_me" name="historial_me" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-vacunas">Vacunas</label>
                            <textarea class="form-control" id="edit-vacunas" name="vacunas" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-color">Color</label>
                            <input type="text" class="form-control" id="edit-color" name="color" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-peso">Peso (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="edit-peso" name="peso" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-observacion">Observación</label>
                            <textarea class="form-control" id="edit-observacion" name="observacion" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);

            if (urlParams.has('action')) {
                const action = urlParams.get('action');

                if (action === 'registered') {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Registrado con éxito!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else if (action === 'edited') {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Editado con éxito!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else if (action === 'deleted') {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Eliminado con éxito!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }

                history.replaceState(null, null, window.location.pathname); // Eliminar el parámetro de la URL
            }

            // Función de búsqueda en tiempo real
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#conejosTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var raza = button.data('raza');
            var genero = button.data('genero');
            var fecha_nac = button.data('fecha_nac');
            var historial_me = button.data('historial_me');
            var vacunas = button.data('vacunas');
            var color = button.data('color');
            var peso = button.data('peso');
            var observacion = button.data('observacion');

            var modal = $(this);
            modal.find('#edit-id').val(id);
            modal.find('#edit-raza').val(raza);
            modal.find('#edit-genero').val(genero);
            modal.find('#edit-fecha_nac').val(fecha_nac);
            modal.find('#edit-historial_me').val(historial_me);
            modal.find('#edit-vacunas').val(vacunas);
            modal.find('#edit-color').val(color);
            modal.find('#edit-peso').val(peso);
            modal.find('#edit-observacion').val(observacion);
        });
    </script>
</body>

</html>
