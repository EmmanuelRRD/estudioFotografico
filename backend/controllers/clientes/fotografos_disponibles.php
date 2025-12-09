<?php
//select * from vista_fotografos_eventos_limitada; --> consulta para trabajar
    include_once './cliente_dao.php';

    $cliente = new clienteDao;

    $datos = $cliente->mostrarFotografos();

    // Indicamos que la respuesta será JSON
    header('Content-Type: application/json');
    
    // Convertimos el array PHP a JSON
    echo json_encode($datos);

?>