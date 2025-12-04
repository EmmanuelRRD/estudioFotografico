<?php
session_start();

if (!isset($_SESSION['usuario_autenticado'])) {
	header("Location: /acceder");
}
?>


<!DOCTYPE html>
<html>

<head>
	<!-- Site made with Mobirise Website Builder v6.1.9, https://mobirise.com -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="generator" content="Mobirise v6.1.9, mobirise.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="../../assets/images/logo.png" type="image/x-icon">
	<meta name="description" content="">


	<title>inicial</title>
	<link rel="stylesheet" href="../../assets/web/assets/mobirise-icons2/mobirise2.css">
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/animatecss/animate.css">
	<link rel="stylesheet" href="../../assets/dropdown/css/style.css">
	<link rel="stylesheet" href="../../assets/socicon/css/styles.css">
	<link rel="stylesheet" href="../../assets/theme/css/style.css">
	<link rel="preload" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap">
	</noscript>
	<link rel="preload" as="style" href="../../assets/mobirise/css/mbr-additional.css?v=K8VXrR">
	<link rel="stylesheet" href="../../assets/mobirise/css/mbr-additional.css?v=K8VXrR" type="text/css">




</head>

<body>
	<!-- Navbar-->
	<section data-bs-version="5.1" class="menu menu2 cid-v0tuSqdwYw" once="menu" id="menu02-1r">


		<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
			<div class="container">
				<div class="navbar-brand">
					<span class="navbar-logo">
						<a href="#">
							<img src="../../assets/images/logo.png" alt="Mobirise Website Builder" style="height: 3rem;">
						</a>
					</span>
					<span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="#">RD Estudio&nbsp;<br></a></span>
				</div>
				<div class="separador_consultas w-50 d-flex justify-content-start">
					<input class="form-control me-2" type="" placeholder="Buscar" aria-label="Search" id="search_id">
				</div>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<form action="/logout" method="post">
						<div class="navbar-buttons mbr-section-btn"><button type="submit" class="btn btn-success display-4">Cerrar sesión</button></div>
					</form>

				</div>
			</div>
		</nav>
	</section>
	<!-- /Navbar-->

	<div class="container mt-5 pt-5">
		<div class="d-flex justify-content-between align-items-center mb-3 pt-3">
			<h2 class="fw-bold text me-3 w-100" id="txtTableName"> Fotógrafos Disponibles </h2>

		</div>

		<div>
			<h2 id="saludo" class="fw-bold text me-3 w-100 animate__animated animate__delay-1s animate__fadeIn pt-5 text-center">
				Bienvenido <?= htmlspecialchars($_SESSION['nombre_usuario']) ?>
				!!!!!
			</h2>

		</div>
		<!-- Tabla de productos -->
		<div class="table-responsive shadow-sm bg-white rounded-5" style="max-height: 65vh; overflow-y: auto;">
			<table class="table table-hover align-middle mb-0" id="tabla-contenido">

			</table>
		</div>
	</div>

	<!--========================== Aqui empiezan los Modales ======================= -->

	<!-- Modal: Agregar  -->
	<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-warning text-white">
					<h5 class="modal-title" id="modalAgregarLabel">Agregar nuevo producto</h5>
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form id="addInfo">
						<div class="row g-3" id="contenidoAgregar">

						</div>
					</form>
					<button class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cancelar</button>
					<button class="btn btn-warning text-white mt-3" id="btn_creador" onclick="">Agregar</button>

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

	<script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../../assets/smoothscroll/smooth-scroll.js"></script>
	<script src="../../assets/ytplayer/index.js"></script>
	<script src="../../assets/dropdown/js/navbar-dropdown.js"></script>
	<script src="../../assets/theme/js/script.js"></script>
	<script src="../../assets/formoid/formoid.min.js"></script>


	<script src="../../backend/scripts/mostrar_tablas.js"></script>
	<script src="../../backend/scripts/enviar_actualizacion.js"></script>
	<script src="../../backend/scripts/eliminar_dato.js"></script>
	<script src="../../backend/scripts/crear.js"></script>
	<script src="../../backend/scripts/consultas.js"></script>

	<input name="animation" type="hidden">
</body>

</html>