<?php
include_once('../database/conexion_bd_usuarios.php');

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$captcha = $_POST['g-recaptcha-response'] ?? null;

if (!$email || !$password) {
    echo json_encode([
        "status" => "error",
        "message" => "Faltan datos"
    ]);
    exit;
}

//Validacion del captcha v2

if (!$captcha) {
    echo json_encode([
        "status" => "error",
        "message" => "Por favor confirma el captcha"
    ]);
    exit;
}

$secretKey = "6Lf9pRcsAAAAAIN56yPj3YxnzFB6mJoC_sUtjpZ0";

$verificacion = file_get_contents(
    "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha"
);

$verificacion = json_decode($verificacion);

if (!$verificacion->success) {
    echo json_encode([
        "status" => "error",
        "message" => "Captcha incorrecto"
    ]);
    exit;
}
//Var si el captcha se completó


$con = new ConexionBDUsuarios();
$conexion = $con->getConexion();

if ($conexion) {

    // Convertimos como están guardados en BD (SHA1)
    $email_hash = sha1($email);
    $pass_hash  = sha1($password);

    $sql = "SELECT * FROM usuarios WHERE Usuario = ? AND Password = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email_hash, $pass_hash);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);


    if ($resultado && mysqli_num_rows($resultado) === 1) {

        $usuario = mysqli_fetch_assoc($resultado);

        session_start();
        $_SESSION['usuario_autenticado'] = true;
        //$_SESSION['nombre_usuario'] = $usuario["Usuario"];
        $_SESSION['nombre_usuario'] = "Emmanuel";
        header('location: ../pages/usuarioAdministrador.php');        

    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Error en correo o contraseña"
        ]);
    }

    mysqli_close($conexion);
}
