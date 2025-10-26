<?php
include_once('./alumno_dao.php');
$alumnoDAO = new AlumnoDAO();

if (isset($_GET['tabla'])) {
    //saca la info del get
    $datos = $alumnoDAO->mostrar($_GET['tabla']);
    
    // Indicamos que la respuesta será JSON
    header('Content-Type: application/json');
    
    // Convertimos el array PHP a JSON
    echo json_encode($datos);
}
?>
