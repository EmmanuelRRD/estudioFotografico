<?php
include_once('./alumno_dao.php');
$alumnoDAO = new AlumnoDAO();

$tabla = $_GET['tabla'] ?? '';
$key   = $_GET['key'] ?? '';
$id    = $_GET['id'] ?? '';

if ($tabla && $key) {
    $datos = $alumnoDAO->mostrarEspecifico($tabla, $key, $id);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($datos);
} else {
    echo json_encode(['error' => 'Faltan parámetros']);
}

?>