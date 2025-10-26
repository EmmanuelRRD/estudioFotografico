<?php
$email = $_POST['email'];
$password = $_POST['password'];

//echo $email."<br>";
//echo $password."<br>";

switch($password){
    case "1":
        require_once('../pages/usuarioCliente.php');
        break;
    case "4":
        require_once('../pages/usuarioAdministrador.php');
        break;
}