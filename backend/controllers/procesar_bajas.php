<?php
include_once('./alumno_dao.php');
$input = json_decode(file_get_contents('php://input'), true);//convertimos y sacamos la info del body
$alumnoDAO = new AlumnoDAO();
$id = $input['id'] ?? null;
$key = $input['key'] ?? null;
$tabla = $input['tabla'] ?? null;

if ($id && $tabla && $key) {
    if ($alumnoDAO->eliminarRegistro($key,$id,$tabla)) {
        echo "ok"; // si todo sale bien
    } else {
        echo "error"; //si la consulta falla
    }
} else {
    echo "error";
}

?>
