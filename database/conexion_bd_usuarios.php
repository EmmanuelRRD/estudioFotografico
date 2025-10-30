<?php

class ConexionBDUsuarios
{
    private $conexion;
    private $host = "localhost:3306";
    private $usuario = "root";
    private $password = "Menma93";
    private $bd = "bd_usuarios_escuela_web_2025";

    public function __construct()
    {
        $this->conexion = mysqli_connect(
            $this->host,
            $this->usuario,
            $this->password,
            $this->bd
        );

        if (!$this->conexion) {
            die("Error en la conexion a la BD usuarios" . mysqli_connect_error());
        }
    }

    public function getConexion()
    {
        return $this->conexion;
    }
}
