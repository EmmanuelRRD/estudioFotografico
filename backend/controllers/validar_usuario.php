<?php
$email = $_POST['email'];
$password = $_POST['password'];

include_once('../../database/conexion_bd_usuarios.php');

$con = new ConexionBDUsuarios();
$conexion = $con->getConexion();

if ($conexion) {


    $email_sifrado = sha1($email);
    $password_sifrafo = sha1($email);

    $sql = "select * from usuarios where Usuario = '$email_sifrado' and Password='$password_sifrafo'";
    $res = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($res) == 1) {
        session_start();
        $_SESSION['usuario_autenticado'] = true;
        $_SESSION['nombre_usuario'] = 'luke';

        header('location: ../../pages/usuarioAdministrador.php');
    } else {
        //require_once('../../pages/login.php');
        //Mostrar un mensaje
        echo "no encontrado";
    }
}

/*
switch($password){
    case "1":
        require_once('../../pages/usuarioCliente.php');
        break;
    case "4":
        require_once('../../pages/usuarioAdministrador.php');
        break;
}
*/