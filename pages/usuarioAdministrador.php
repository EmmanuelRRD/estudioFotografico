<?php
session_start();
if(!$_SESSION['usuario_autenticado']){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="icon" href="../assets/images/1icon (3).png" type="image/png">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Cliente</title>
    <!-- 
    implementando sesiones
    -->

</head>

<body>

    <!-- 
    #txtTableName
    #titulosTabla
    #tablaCuerpo
    -->


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
                    <li class="nav-item"><a class="nav-link" href="#contact">Algo</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tablas
                        </a>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button" onclick="enviar('clientes')">Clientes</button></li>
                            <li><button class="dropdown-item" type="button" onclick="enviar('fotografos')">Fotógrafos</button></li>
                            <li><button class="dropdown-item" type="button" onclick="enviar('materiales')">Materiales</button></li>
                            <li><button class="dropdown-item" type="button" onclick="enviar('eventos')">Eventos</button></li>
                            <li><button class="dropdown-item" type="button" onclick="enviar('alumnos')">PruebaBD</button></li>
                            <li><button class="dropdown-item" type="button" onclick="enviar('libros')">Libros</button></li>
                        </ul>

                    </li>
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
            <h2 class="fw-bold text" id="txtTableName"> Nombre de la tabla </h2>
            <button class="btn btn-success" id="btn-agregar" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                ➕ Agregar
            </button>
        </div>

        <!-- Tabla de productos -->
        <div class="table-responsive shadow-sm bg-white rounded-3" style="max-height: 65vh; overflow-y: auto;">
            <table class="table table-hover align-middle mb-0" id="tabla-contenido">

            </table>
        </div>
    </div>

    <div id="resultado" class="mt-3"></div>
    <!--========================== Tablas de contenido ======================= 
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6045.3003145248895!2d-73.9884657!3d40.7477229!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9ac1f1b85%3A0x7e33d1c0e7af3be4!2zMzUwIDV0aCBBdmUsIE5ldyBZb3JrLCBOWSAxMDExOCwg0KHQqNCQ!5e0!3m2!1sru!2sru!4v1689597362021!5m2!1sen!2sen" class="mt-5 text-center" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    -->
    
    <!-- Para editar -->
    <div id="resultado" class="mt-3"></div>



    <!--========================== Aqui empiezan los Modales ======================= -->

    <!-- Modal: Agregar producto -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalAgregarLabel">Agregar nuevo producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3" id="contenidoAgregar">

                    </div>
                    <button class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-warning text-white mt-3" onclick="metodoGuardaCambios('el id del producto')">Agregar</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Editar producto -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalEditarLabel">Editar producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="newInfo">
                        <div class="row g-3" id="contenidoEditar">

                    </div>
                    </form>
                    <button class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-warning text-white mt-3" id="btnActualizar">Guardar cambios</button>

                </div>
            </div>
        </div>
    </div>

    <script src="../assets/scripts/mostrar_tablas.js"></script>
    <script src="../assets/scripts/enviar_actualizacion.js"></script>
    <script src="../assets/scripts/eliminar_dato.js"></script>
</body>

</html>