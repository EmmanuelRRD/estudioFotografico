<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="icon" href="../assets/images/1icon (3).png" type="image/png">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Cliente</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <img src="../assets/images/1icon (3).png" alt="" width="40" height="40" class="rounded-lg">
                <span class="fw-bold">RD Studio</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="#market">Fotografos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#impact">Mis Palnes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                    <li class="nav-item d-none d-sm-block">
                        <a href="../pages/index.php" class="btn btn-outline-secondary btn-sm">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text"> Mis sesiones fotograficas </h2>
        </div>

        <!-- Tabla de productos -->
        <div class="table-responsive shadow-sm bg-white rounded-3">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Cantidad (kg)</th>
                        <th>Precio (MXN)</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Tomate Roma</td>
                        <td>Verdura</td>
                        <td>1000</td>
                        <td>$12,500</td>
                        <td>Fresnillo, Zac.</td>
                        <td class="table-actions">
                            <!-- La ventana emergente con sus respectivas acciones -->
                            <button class="btn btn-sm">🗑️</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--========================== Aqui empiezan los Modales ======================= -->

</body>

</html>