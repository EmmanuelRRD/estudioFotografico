<?php
include_once('./alumno_dao.php');

$input = file_get_contents("php://input");
$data = json_decode($input, true);         

$tabla = $data['tabla'];
$datos = $data['datos'];

$alumnoDAO = new AlumnoDAO();

return $alumnoDAO->agregar($tabla, $datos);

