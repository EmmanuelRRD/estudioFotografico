<?php

include_once('./alumno_dao.php');
$alumnoDAO = new AlumnoDAO();

$input = file_get_contents("php://input");

//de json a array
$data = json_decode($input, true);

$tabla = $data['tabla'];
$id = $data['id'];
$key = $data['key'];
$datos = $data['datos'];

return $alumnoDAO -> actualizar($key,$id,$tabla,$datos);
?>
