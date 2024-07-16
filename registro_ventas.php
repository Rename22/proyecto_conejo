<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Obtener conejos vendidos
$sql = "SELECT * FROM conejos WHERE estado = 'No Disponible'";
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
                        <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Ventas</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="ventas.php" class="dropdown-item">Vender</a>
                            <a href="registro_ventas.php" class="dropdown-item">Registro de ventas</a>
                        </div>
                    </div>
                    <a href="registro.php" class="nav-item nav-link ">Registros</a>
                    <a href="estadistico.html" class="nav-item nav-link">Estadistica</a>
                    <a href="videos.html" class="nav-item nav-link">Videos</a>
                    <a href="bitacora.html" class="nav-item nav-link ">Bitácora</a>
                    <a href="contact.html" class="nav-item nav-link">Contactanos</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container mt-5">
        <h2 class="mt-5">Conejos Vendidos</h2>
        
        <!-- Campo de búsqueda -->
        <input type="text" id="searchInput" class="form-control w-75 light-table-filter" data-table="order-table" placeholder="Buscar ventas...">
        <br>
        <br>
        <table class="table table-bordered order-table" id="ventasTable">
            <thead>
                <tr>
                    <th>Raza</th>
                    <th>Género</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Color</th>
                    <th>Peso (kg)</th>
                    <th>Precio</th>
                    <th>Fecha y Hora de Venta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['raza']}</td>
                            <td>{$row['genero']}</td>
                            <td>{$row['fecha_nac']}</td>
                            <td>{$row['color']}</td>
                            <td>{$row['peso']} kg</td>
                            <td>\${$row['precio']}</td>

                            <td>{$row['fecha_venta']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay conejos vendidos</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Bugs</span>Bunny</h1>
                <p class="m-0">En "Bugs Bunny", nuestra misión es criar y proporcionar conejos de alta calidad, saludables y bien cuidados, tanto como mascotas cariñosas como para fines de exhibición.
                    Nos comprometemos a mantener estándares éticos y de bienestar animal en todas nuestras prácticas de cría y cuidado.</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Ponte en Contacto</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>Latacaunga, San Felipe</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>0985632578</p>
                        <p><i class="fa fa-envelope mr-2"></i>bugsbunny@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Accesos</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Crianza</a>
                            <a class="text-white mb-2" href="ventas.php"><i class="fa fa-angle-right mr-2"></i>Ventas</a>
                            <a class="text-white mb-2" href="registro.php"><i class="fa fa-angle-right mr-2"></i>Registros</a>
                            <a class="text-white mb-2" href="estadistico"><i class="fa fa-angle-right mr-2"></i>Estadisticas</a>
                            <a class="text-white mb-2" href="videos.html"><i class="fa fa-angle-right mr-2"></i>Videos</a>
                            <a class="text-white mb-2" href="bitacora.html"><i class="fa fa-angle-right mr-2"></i>Bitácora</a>
                            <a class="text-white" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contactanos</a>
                        </div>
                    </div>
                    
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function() {
            // Función de búsqueda en tiempo real
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#ventasTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</body>
</html>
