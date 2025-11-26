<?php
session_start();

$url = $_GET['url'] ?? '';
$url = trim($url, '/'); // limpiar barras

switch ($url) {

    // Página inicio
    case '':
    case 'rdestudio':
        require "index.html";
        break;
    
    // Página login
    case '':
    case 'acceder':
        require "login.php";
        break;

    // Crear Cuenta
    case '':
    case 'crear_cuenta':
        require "create_count.php";
        break;

    // Acción: validar usuario
    case 'validar':
        require "backend/controllers/validar_usuario.php";
        break;

    // Página principal del usuario admin
    case 'admin':
        require "backend/pages/usuarioAdministrador.php";
        break;

    // Cerrar sesión
    case 'logout':
        require "backend/controllers/cerrar_sesion.php";
        break;

    // Páginas adicionales (si quieres agregar más)
    case 'usuarios':
        require "backend/pages/usuarios.php";
        break;

    // Página 404
    default:
        http_response_code(404);
        require "404.php";
        break;
}
