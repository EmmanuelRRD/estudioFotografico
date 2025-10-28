<?php
$email = $_POST['email'];
$password = $_POST['password'];

//echo $email."<br>";
//echo $password."<br>";

//Hacer las verificaciones en la BD usuarios
$conexion = true;

if($conexion){

    //CIFRADO!!!

    $sql = "select * from usuarios where nombre_usuario = '$email' and password='$password'";
    //$res = mysqli_query($conexion, $sql);
    $res = 1;
    
    if($res==1){
        session_start();
        $_SESSION['usuario_autenticado'] = true;
        $_SESSION['nombre_usuario'] = 'luke';

        header('location: ../../pages/usuarioAdministrador.php');
    }else{
        require_once('../../pages/login.php');
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