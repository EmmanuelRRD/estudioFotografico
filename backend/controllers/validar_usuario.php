<?php
include_once('../database/conexion_bd_usuarios.php');

$input = file_get_contents("php://input");
$data = json_decode($input, true);         

$email = $data['email'];
$password = $data['password'];

$con = new ConexionBDUsuarios();
$conexion = $con->getConexion();

if ($conexion) {

    $email_sifrado = sha1($email);
    $password_sifrafo = sha1($password);

    $sql = "select * from usuarios where Usuario = '$email_sifrado' and Password='$password_sifrafo'";
    $res = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($res) == 1) {

    // Puedes devolver información del usuario si quieres
    $usuario = mysqli_fetch_assoc($res);

    echo json_encode([
        "status" => "ok",
        "message" => "Bienenido",
        "usuario" => $usuario
    ]);

} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error en correo o contraseña"
    ]);
}

}
