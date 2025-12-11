<?php
include_once('./alumno_dao.php');
$alumnoDAO = new AlumnoDAO();

$datoAMostrar = $_GET['ver'];
$tabla = $_GET['tabla'] ?? '';

if ($tabla && $datoAMostrar) {
    $datos = $alumnoDAO->mostrarEspecificoLimitado($tabla, $datoAMostrar);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($datos);
} else {
    echo json_encode(['error' => 'Faltan parámetros']);
}
?>