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

	<!-- FullCalendar CSS -->
	<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">

	<!-- FullCalendar JS -->
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>


	<script src="../../backend/scripts/generar_calendario.js"></script>
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
					</div>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
						<li class="nav-item dropdown open">
							<div class="separador_consultas d-flex justify-content-center w-100">
								<input class="form-control me-2" type="text" placeholder="Buscar" aria-label="Search" id="search_id" style="max-width: 300px;">
							</div>

						</li>
						<li class="nav-item">
					</ul>
					<form action="/logout" method="post">
						<div class="separador_consultas d-flex justify-content-center w-100">
							<div class="navbar-buttons mbr-section-btn"><button type="submit" class="btn btn-success display-4">Cerrar sesión</button></div>
						</div>
					</form>

				</div>
			</div>
		</nav>
	</section>
	<!-- /Navbar-->

	<div class="container mt-5 pt-5">
		<div class="d-flex justify-content-between align-items-center mb-3 pt-3">
			<h2 class="fw-bold text me-3 w-100" id="txtTableName" style="display: none;"> Fotógrafos Disponibles </h2>

		</div>

		<div>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<h1 class="display-4">Bienvenido <?= htmlspecialchars($_SESSION['nombre_usuario']) ?>!!!!!</h1>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>


		</div>

		<div id="calendario">

		</div>
	</div>

	<!--========================== Aqui empiezan los Modales ======================= -->

	<script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../../assets/smoothscroll/smooth-scroll.js"></script>
	<script src="../../assets/ytplayer/index.js"></script>
	<script src="../../assets/dropdown/js/navbar-dropdown.js"></script>
	<script src="../../assets/theme/js/script.js"></script>
	<script src="../../assets/formoid/formoid.min.js"></script>
	

	<input name="animation" type="hidden">
</body>

</html>