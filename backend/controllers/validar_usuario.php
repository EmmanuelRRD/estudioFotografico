<?php
include_once('../database/conexion_bd_escuela.php');

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$captcha = $_POST['g-recaptcha-response'] ?? null;

// Validación básica
if (!$email || !$password) {
    echo json_encode([
        "status" => "error",
        "message" => "Faltan datos."
    ]);
    exit;
}

// Validación del CAPTCHA
if (!$captcha) {
    echo json_encode([
        "status" => "error",
        "message" => "Por favor confirma el captcha."
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
        "message" => "Captcha incorrecto."
    ]);
    exit;
}

// CONEXIÓN BD
$con = new ConexionBDEscuela();
$conexion = $con->getConexion();

if ($conexion) {

    $email_hash = sha1($email);
    $pass_hash  = sha1($password);

    $sql = "SELECT * FROM usuario WHERE correo = ? AND contrasenna = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email_hash, $pass_hash);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    // Usuario encontrado
    if ($resultado && mysqli_num_rows($resultado) === 1) {

        $usuario = mysqli_fetch_assoc($resultado);

        $nombre_completo = $usuario['nombre'] . " " . $usuario['primer_ap'] . " " . $usuario['segundo_ap'];

        session_start();
        $_SESSION['usuario_autenticado'] = true;
        $_SESSION['nombre_usuario'] = $nombre_completo;  

        if($usuario['tipo_usuario']=="cliente"){
            echo json_encode([
            "status" => "ok",
            "redirect" => "cliente"
        ]);
        }else{
            echo json_encode([
            "status" => "ok",
            "redirect" => "admin"
        ]);
        }
        
        exit;
    }

    // Usuario incorrecto
    echo json_encode([
        "status" => "error",
        "message" => "Correo o contraseña incorrectos."
    ]);
    exit;
}

echo json_encode([
    "status" => "error",
    "message" => "Error al conectar a la base de datos."
]);
exit;
