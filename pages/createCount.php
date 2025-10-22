<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inversicolas — Crear cuenta</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">


  <div class="bg-white shadow-lg rounded-3 p-4 w-100" style="max-width: 600px;">
    <!-- Logo -->
    <div class="text-center mb-4">
      <img src="../assets/images/1icon (3).png" alt="Logo" class="img-fluid" style="max-width: 120px;">
    </div>

    <!-- Título -->
    <h3 class="text-center mb-4 fw-bold text-success">Crear cuenta</h3>

    <form action="./login.html" method="POST" class="row g-3"><!-- Inicio Formulario -->

      <!-- Columna izquierda -->
      <div class="col-md-6 uno">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" id="nombre" name="nombre" class="form-control">
        </div>

        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" id="apellido" name="apellido" class="form-control">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Correo electrónico</label>
          <input type="email" id="email" name="email" class="form-control">
        </div>
      </div>

      <!-- Columna derecha -->
      <div class="col-md-6 dos">
        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="tel" id="telefono" name="telefono" class="form-control">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" id="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
          <label for="confirmar" class="form-label">Confirmar contraseña</label>
          <input type="password" id="confirmar" name="confirmar" class="form-control">
        </div>
      </div>

      <!-- Selección tipo usuario -->
      <div class="col-12">
        <label for="tipo" class="form-label">Tipo usuario</label>
        <select id="tipo" name="tipo" class="form-select">
          <option value="1">Cliente</option>
          <option value="2">Fotografo</option>
          <option value="3">Administrador</option>
        </select>
      </div>

      <!-- Botón -->
      <div class="col-12">
        <button type="submit" class="btn btn-success w-100">Crear cuenta</button>
      </div>

      <!-- Divider -->
      <div class="col-12 text-center mt-3">
        <hr>
        <p class="mb-0 text-muted">
          ¿Ya tienes cuenta?
          <a href="./login.html" class="text-success fw-semibold text-decoration-none">Inicia sesión aquí</a>
        </p>
      </div>
    </form><!-- Fin Formulario -->
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
