<?php
include_once('./alumno_dao.php');
$alumnoDAO = new AlumnoDAO();

$tabla = $_GET['tabla'] ?? '';
$limitador = $_GET['limitador'];
$key = $_GET['key'];
$id = $_GET['id'];

if ($tabla && $limitador) {
    $datos = $alumnoDAO->busquedaPro($tabla, $limitador,$key,$id);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($datos);
} else {
    echo json_encode(['error' => 'Faltan parámetros']);
}
?>