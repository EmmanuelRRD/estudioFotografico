<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RD_Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../assets/images/logos/2-Picsart-BackgroundRemover.png" type="image/png">
  <link rel="stylesheet" href="../assets/styles/style.css">
  <style>
    body {
      background: linear-gradient(to bottom right, #FEF3E2, #ffffff);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      max-width: 420px;
      width: 100%;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
      background-color: #fff;
    }

    .brand-logo img {
      width: 80px;
    }

  </style>
</head>

<body>
  <div class="login-card text-center">
    <!-- Logo -->
    <div class="brand-logo mb-3 mx-auto">
      <img src="../assets/images/1icon (3).png" alt="Logo RD Estudio" class="img-fluid">
    </div>

    <h1 class="h3 fw-bold mb-1">RD Foto Estudio</h1>
    <p class="text-muted mb-4">Inicia sesión para continuar</p>

    <!-- 
    email
    password
    -->

    <!-- Formulario -->
    <form action="../backend/controllers/validar_usuario.php" method="POST" class="text-start">
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="example@server.com">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="********">
      </div>

      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="remember">
          <label class="form-check-label" for="remember">Recordarme</label>
        </div>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn text-white fw-semibold py-2">Iniciar sesión</button>
      </div>
    </form>

    <!-- Divider -->
    <div class="border-top my-4"></div>

    <p class="text-muted small mb-0">
      ¿No tienes cuenta?
      <a href="./createCount.php" class="text text-decoration-none fw-semibold">Regístrate aquí</a>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
