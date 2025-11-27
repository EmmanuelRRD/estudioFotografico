<?php
header("Content-Type: application/json; charset=UTF-8");

try {

    if (!isset($_POST["email"])) {
        echo json_encode([
            "status" => "error",
            "msg" => "No se recibieron todos los datos"
        ]);
        exit;
    }

    // ------ Recibir datos ------
    $nombre = $_POST["nombre"] ?? "";
    $primer_ap = $_POST["primer_ap"] ?? "";
    $segundo_ap = $_POST["segundo_ap"] ?? "";
    $email = $_POST["email"] ?? "";
    $telefono = $_POST["telefono"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirmar = $_POST["confirmar"] ?? "";

    if ($password !== $confirmar) {
        echo json_encode([
            "status" => "error",
            "msg" => "Las contraseñas no coinciden"
        ]);
        exit;
    }

    require "../config/conexion.php";

    // ------ Verificar correo duplicado ------
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        throw new Exception("El correo ya está registrado.");
    }

    // ------ Insertar ------
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $ins = $conn->prepare("INSERT INTO usuarios(nombre, primer_ap, segundo_ap, email, telefono, password) VALUES (?, ?, ?, ?, ?, ?)");
    $ins->bind_param("ssssss", $nombre, $primer_ap, $segundo_ap, $email, $telefono, $passwordHash);

    if (!$ins->execute()) {
        throw new Exception("Error al registrar usuario.");
    }

    echo json_encode([
        "status" => "ok",
        "msg" => "Usuario registrado"
    ]);
    exit;
} catch (Exception $e) {

    echo json_encode([
        "status" => "error",
        "msg" => $e->getMessage()
    ]);
    exit;
}
