<?php
include_once('./cliente_dao.php');
$cliente = new ClienteDAO();

header('Content-Type: application/json; charset=UTF-8');

if (isset($_GET['nombre'])) {

    // Normaliza acentos correctamente
    $nombre = urldecode($_GET['nombre']);

    // Obtiene los datos desde el DAO
    $datos = $cliente->mostrarJoin($nombre);

    // Respuesta JSON segura
    echo json_encode($datos, JSON_UNESCAPED_UNICODE);
}else{
    echo "error al recibir dato";
}
?>
