<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/styles/style.css">
  <link rel="icon" href="../assets/images/1icon (3).png" type="image/png">
  <title>RD Foto Estudio</title>
</head>

<body>

  <style>
    body {
      background: linear-gradient(to bottom right, #FEF3E2, #ffffff);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container-principal {
      max-width: 420px;
      width: 100%;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
      background-color: #fff;
    }
  </style>


  <div class="bg-white rounded-3 p-4 w-100 container-principal" style="max-width: 700px; max-height: 100vh;">
    <!-- Logo -->
    <div class="text-center">
      <img src="../assets/images/1icon (3).png" alt="Logo" class="img-fluid" style="max-width: 100px;">
    </div>

    <!-- Título -->
    <h3 class="text-center mb-4 fw-bold display-5">Crear cuenta</h3>

    <form action="./login.html" method="POST" class="row g-3"><!-- Inicio Formulario -->
      <!-- 
      nombre
      primer_ap
      segundo_ap
      email
      telefono
      password}
      confirmar
      tipo
      -->
      <!-- Columna izquierda -->
      <div class="col-md-6 uno">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" id="nombre" name="nombre" class="form-control">
        </div>

        <div class="mb-3">
          <label for="primer_ap" class="form-label">Apellido</label>
          <input type="text" id="primer_ap" name="primer_ap" class="form-control">
        </div>

        <div class="mb-3">
          <label for="segundo_ap" class="form-label">Apellido</label>
          <input type="text" id="segundo_ap" name="segundo_ap" class="form-control">
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

        <!-- Selección tipo usuario -->
        <div class="col-12">
          <label for="tipo" class="form-label">Tipo usuario</label>
          <select id="tipo" name="tipo" class="form-select">
            <option value="1">Cliente</option>
            <option value="2">Fotografo</option>
            <option value="3">Administrador</option>
          </select>
        </div>
      </div>



      <!-- Botón -->
      <div class="col-12 mb-0 pb-0">
        <button type="submit" class="btn w-100">Crear cuenta</button>
      </div>

      <!-- Divider -->
      <div class="col-12 text-center">
        <hr>
        <p class="mb-0 mt-0 text-muted">
          ¿Ya tienes cuenta?
          <a href="./login.php" class="text fw-semibold text-decoration-none">Inicia sesión aquí</a>
        </p>
      </div>
    </form><!-- Fin Formulario -->
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>