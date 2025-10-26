<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio RD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" href="../assets/images/1icon (3).png" type="image/png">
</head>

<body class="bg-light">

    <!-- Header -->
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
                    <li class="nav-item"><a class="nav-link" href="#market">Marketplace</a></li>
                    <li class="nav-item"><a class="nav-link" href="#impact">Impacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                    <li class="nav-item d-none d-sm-block">
                        <a href="./login.php" class="btn btn-outline-secondary btn-sm">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <header class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold">Momentos Dorados</h1>
                    <p class="lead text-secondary mt-3">En cada disparo hay una historia, una emoción y una verdad.
                        Robles Dorado nace de la pasión por mirar el mundo a través de la luz: los colores del
                        atardecer, las sonrisas espontáneas, los detalles que otros pasan por alto.
                        Nuestro propósito es sencillo: capturar lo que hace que cada instante sea irrepetible.</p>
                    <div class="mt-4">
                        <a href="#market" class="btn btn-success me-2">Mi Trabajo</a>
                    </div>
                    <div class="row mt-4 text-center text-md-start">
                        <div class="col-6 col-sm-3 mb-2">
                            <div class="bg-white shadow rounded p-3">
                                <div class="text-muted small">Proyectos activos</div>
                                <div class="fw-bold h5">128</div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 mb-2">
                            <div class="bg-white shadow rounded p-3">
                                <div class="text-muted small">Toneladas negociadas</div>
                                <div class="fw-bold h5">4,200</div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 mb-2">
                            <div class="bg-white shadow rounded p-3">
                                <div class="text-muted small">Productores</div>
                                <div class="fw-bold h5">340</div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 mb-2">
                            <div class="bg-white shadow rounded p-3">
                                <div class="text-muted small">Inversionistas</div>
                                <div class="fw-bold h5">1,050</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="card shadow rounded-3">
                        <img src="../assets/images/emp/PH (9).jpg" style="width: 100%;" class="card-img-top"
                            alt="Agricultura">
                        <div class="card-body">
                            <h5 class="card-title">Compra directa de cosechas</h5>
                            <p class="card-text text-secondary">Negocia y asegura la compra de materia prima
                                directamente
                                del productor. Asegura calidad y precio.</p>
                            <div class="text-muted small d-flex gap-2">
                                <span>📦 Entregas regionales</span>•<span>🔒 Pagos seguros</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Fotografos -->
    <section id="market" class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold">Nuestros Fotografos:</h2>
                <a href="#" class="text-decoration-none">Ver todo</a>
            </div>
            <div class="row g-3">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="../assets/images/emp/Lucid_Origin_Female_photographer_walking_through_nature_camera_1.jpg"
                            class="card-img-top" alt="Tomate">
                        <div class="card-body">
                            <h5 class="card-title">Tomate Roma — 1,000 kg</h5>
                            <p class="text-secondary small">Origen: Zacatecas • Calidad: A</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="fw-bold">$12,500 MXN</span>
                                <button class="btn btn-success btn-sm">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="../assets/images/emp/PH (5).jpg" class="card-img-top" alt="Chile">
                        <div class="card-body">
                            <h5 class="card-title">Chile Serrano — 500 kgsadasda</h5>
                            <p class="text-secondary small">Origen: Fresnillo • Calidad: B</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="fw-bold">$6,200 MXN</span>
                                <button class="btn btn-success btn-sm">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="../assets/images/emp/Lucid_Origin_Male_photographer_holding_a_camera_looking_into_t_3.jpg"
                            class="card-img-top" alt="Cebolla">
                        <div class="card-body">
                            <h5 class="card-title">Cebolla blanca — 2,000 kg</h5>
                            <p class="text-secondary small">Origen: Río Grande • Calidad: A</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="fw-bold">$18,000 MXN</span>
                                <button class="btn btn-success btn-sm">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="../assets/images/emp/Lucid_Origin_Male_photographer_holding_a_camera_looking_into_t_1.jpg"
                            class="card-img-top" alt="Calabaza">
                        <div class="card-body">
                            <h5 class="card-title">Calabaza — 750 kg</h5>
                            <p class="text-secondary small">Origen: Sombrerete • Calidad: A</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="fw-bold">$8,900 MXN</span>
                                <button class="btn btn-success btn-sm">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impacto -->
    <section id="trabajos" class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold">Nuestro trabajo:</h2>
                <a href="#" class="text-decoration-none">Ver todo</a>
            </div>
            <div class="row mt-4 text-center">
                <div class="col-6 col-sm-3 mb-3">
                    <div class="bg-white shadow rounded p-2">
                        <img src="../assets/images/modelos/model (1).jpg" class="img-fluid rounded" alt="Modelo 1">
                    </div>
                </div>
                <div class="col-6 col-sm-3 mb-3">
                    <div class="bg-white shadow rounded p-2">
                        <img src="../assets/images/modelos/model (2).jpg" class="img-fluid rounded" alt="Modelo 2">
                    </div>
                </div>
                <div class="col-6 col-sm-3 mb-3">
                    <div class="bg-white shadow rounded p-2">
                        <img src="../assets/images/modelos/model (3).jpg" class="img-fluid rounded" alt="Modelo 3">
                    </div>
                </div>
                <div class="col-6 col-sm-3 mb-3">
                    <div class="bg-white shadow rounded p-2">
                        <img src="../assets/images/modelos/model (4).jpg" class="img-fluid rounded" alt="Modelo 4">
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

    <!-- Impacto -->
    <section id="impact" class="py-5">
        <div class="container bg-white rounded-3 p-4 shadow-sm">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="fw-bold">Impacto social y transparencia</h2>
                    <p class="text-secondary mt-2">Cada proyecto muestra uso de fondos, meta productiva y reporte de
                        cumplimiento. Promovemos prácticas sostenibles y pago justo a productores.</p>
                    <ul class="mt-3 text-secondary small">
                        <li>• Trazabilidad por lote y productor</li>
                        <li>• Reportes mensuales y fotografías de campo</li>
                        <li>• Opciones de reinversión y compra recurrente</li>
                    </ul>
                    <a href="#contact" class="btn btn-success mt-3">Comenzar ahora</a>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1200&auto=format&fit=crop"
                        class="img-fluid rounded shadow" alt="Impacto">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="py-5 bg-light mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">Inversicolas</h5>
                    <p class="text-secondary small mt-2">Conectando capital con campo para generar valor local.
                        Zacatecas y todo México.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">Enlaces</h5>
                    <ul class="list-unstyled text-secondary small mt-2">
                        <li><a href="#how" class="text-decoration-none text-secondary">Cómo funciona</a></li>
                        <li><a href="#market" class="text-decoration-none text-secondary">Marketplace</a></li>
                        <li><a href="#impact" class="text-decoration-none text-secondary">Impacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">Contacto</h5>
                    <p class="text-secondary small mt-2">AgroLinkdice@hola.mx</p>
                    <p class="text-secondary small">Tel: +52 492 000 0000</p>
                </div>
            </div>
            <div class="text-center text-secondary small mt-4 border-top pt-3">&copy; 2025 Inversicolas — Todos los
                derechos reservados.</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>