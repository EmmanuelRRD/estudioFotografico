<?php
session_start();

if (!isset($_SESSION['usuario_autenticado'])) {
	header("Location: /acceder");
	exit;
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
	<link rel="stylesheet" href="assets/tablas/styleTablas.css">
	<link rel="stylesheet" href="assets/modales/style.css">

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
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<div class="hamburger">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
						<li class="nav-item dropdown open">
							<a class="nav-link link text-white dropdown-toggle show display-4"
								href="#" aria-expanded="true" data-toggle="dropdown-submenu" data-bs-toggle="dropdown"
								data-bs-auto-close="outside">Administrar Datos</a>
							<div class="dropdown-menu show" aria-labelledby="dropdown-441" data-bs-popper="none">

								<button class="text-white dropdown-item display-4" type="button" onclick="enviar('equipo_trabajo','Equipos de trabajo')">Equipos de trabajo</button>
								<button class="text-white dropdown-item display-4" type="button" onclick="enviar('estudio','Sucursal')">Sucursal</button>
								<button class="text-white dropdown-item display-4" type="button" onclick="enviar('evento','Eventos')">Eventos</button>
								<button class="text-white dropdown-item display-4" type="button" onclick="enviar('material','Equipo Fotografico')">Equipo Fotografico</button>
								<button class="text-white dropdown-item display-4" type="button" onclick="enviar('nota','Notas')">Notas</button>
								<button class="text-white dropdown-item display-4" type="button" onclick="enviar('usuario','Usuarios')">Usuarios</button>

							</div>
						</li>
						<li class="nav-item">
					</ul>
					<form action="/logout" method="post">
						<div class="navbar-buttons mbr-section-btn"><button type="submit" id="btn_cerrar" class="btn btn-success display-4">Cerrar sesión</button></div>
					</form>

				</div></div>
		</nav>
	</section>
	<!-- /Navbar-->

	<div class="container mt-5 pt-5">
		<div class="d-flex justify-content-between align-items-center mb-3 pt-3">
			<h2 class="fw-bold text me-3 w-100" id="txtTableName" style="display: none;"> Nombre de la tabla </h2>
			<!-- ==================== El hidden ================== -->
			<input type="hidden" id="nombre-tabla-bd" name="nombre-tabla-bd" />
			<input type="hidden" id="nombre-publico-tabla-bd" name="nombre-tabla-bd" />
			<input type="hidden" id="nombre-col-bd" name="nombre-col-bd" />

			<div class="separador_consultas w-100 d-flex justify-content-start">
				<input class="form-control me-2" type="hidden" placeholder="Buscar" aria-label="Search" id="search_id">
				<button class="btn btn-light" id="clear_btn" type="button" style="display: none !important;">✖</button>
			</div>

			
			<input type="hidden" id="search_tabla" name="search_tabla" />
			<input type="hidden" id="nombre-tabla" name="nombre-tabla" />
			<button class="btn display-4" id="btn-agregar" data-bs-toggle="modal" data-bs-target="#modalAgregar" style="display: none;">
				➕
			</button>
		</div>
		<div>
			<h2 id="saludo" class="fw-bold text me-3 w-100 animate__animated animate__delay-1s animate__fadeIn pt-5 text-center">
				Bienvenido <?= htmlspecialchars($_SESSION['nombre_usuario']) ?>
				!!!!!
			</h2>

		</div>
		<!-- Tabla de productos -->
		<div class="table-responsive shadow-sm bg-white rounded-5" style="max-height: 65vh; overflow-y: auto;">
			<table id="tabla-contenido" class="table table-bordered"></table>

		</div>
	</div>

	<!--========================== Aqui empiezan los Modales ======================= -->

	<!-- Modal: Agregar -->
	<div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-fit">
			<div class="modal-content shadow-lg rounded-4">

				<div class="modal-header bg-success text-white rounded-top-4">
					<h5 class="modal-title">Agregar</h5>
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">
					<form id="addInfo">

						<div class="row g-3" id="contenidoAgregar"></div>

					</form>
				</div>

				<div class="modal-footer navbar-buttons mbr-section-btn ">
					<button class="btn btn-info display-3" data-bs-dismiss="modal">Cancelar</button>
					<button class="btn btn-success display-3" id="btn_creador">Agregar</button>
				</div>

			</div>
		</div>
	</div>

	<!-- Modal: Editar producto -->
	<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<div class="modal-header bg-success text-white">
					<h5 class="modal-title" id="modalEditarLabel">Editar</h5>
					<button type="button" class="btn-info btn-close-white" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">
					<form id="newInfo">
						<div class="row g-3" id="contenidoEditar"></div>
					</form>
				</div>

				<div class="modal-footer navbar-buttons mbr-section-btn ">
					<button class="btn btn-info display-3" data-bs-dismiss="modal">Cancelar</button>
					<button class="btn btn-success display-3" id="btnActualizar">Guardar cambios</button>
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