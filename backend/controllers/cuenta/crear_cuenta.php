<?php
header("Content-Type: application/json; charset=UTF-8");
include_once('../../database/conexion_bd_escuela.php');

$db = new ConexionBDEscuela();
$conexion = $db->getConexion();

try {

    // Validar campos obligatorios
    $campos = ["nombre", "primer_ap", "segundo_ap", "email", "telefono", "password", "confirmar", "fecha_nac"];
    foreach ($campos as $campo) {
        if (!isset($_POST[$campo]) || trim($_POST[$campo]) === "") {
            echo json_encode(["status" => "error", "msg" => "Falta el campo: $campo"]);
            exit;
        }
    }

    // Recibir datos
    $nombre = $_POST["nombre"];
    $primer_ap = $_POST["primer_ap"];
    $segundo_ap = $_POST["segundo_ap"];
    $telefono = $_POST["telefono"];
    $fecha_nac = $_POST["fecha_nac"];
    $c = $_POST["email"];
    $p = $_POST["password"];
    $confirmar = $_POST["confirmar"];
    $tipo_usuario = "cliente";

    // Validar contraseñas iguales
    if ($p !== $confirmar) {
        echo json_encode(["status" => "error", "msg" => "Las contraseñas no coinciden"]);
        exit;
    }

    // Encriptar contraseña correctamente
    $pass = sha1($p);

    // HASH del correo (si realmente lo quieres en BD encriptado)
    $correo = sha1($c);

    // ============ VALIDAR SI EL CORREO YA EXISTE ============
    $stmt = $conexion->prepare("SELECT correo FROM usuario WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["status" => "error", "msg" => "El correo ya está registrado"]);
        exit;
    }

    // ============ GENERAR ID USUARIO ============
    // 3 primeras letras del nombre (minúsculas)
    $primerasLetras = strtolower(substr($nombre, 0, 3));

    // 3 primeros números del teléfono
    $primerosTresNumeros = substr($telefono, 0, 3);

    $id_usuario = $primerasLetras . $primerosTresNumeros;

    // ============ INSERTAR EN BD ============
    $sql = "INSERT INTO usuario (
                id_usuario, id_estudio, nombre, primer_ap, segundo_ap,
                fecha_nac, telefono, correo, tipo_usuario, contrasenna
            )
            VALUES (?, NULL, ?, ?, ?, ?, ?, ?, ?, ?)";

    $insert = $conexion->prepare($sql);
    $insert->bind_param(
        "sssssssss",
        $id_usuario,
        $nombre,
        $primer_ap,
        $segundo_ap,
        $fecha_nac,
        $telefono,
        $correo,
        $tipo_usuario,
        $pass
    );

    if (!$insert->execute()) {
        throw new Exception("Error al registrar usuario: " . $conexion->error);
    }

    echo json_encode([
        "status" => "ok",
        "msg" => "Cuenta creada correctamente",
        "id_usuario" => $id_usuario
    ]);
    exit;

} catch (Exception $e) {

    echo json_encode([
        "status" => "error",
        "msg" => $e->getMessage()
    ]);
    exit;
}
