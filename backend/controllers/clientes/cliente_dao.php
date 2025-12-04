<?php

include_once('../../database/conexion_bd_escuela.php');

class clienteDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionBDEscuela();
    }

    //------------ Consultas -----------
    public function mostrarFotografos()
    {
        $sql = "SELECT * FROM vista_fotografos_eventos_limitada";

        $res = mysqli_query($this->conexion->getConexion(), $sql);

        $datos = mysqli_fetch_all($res, MYSQLI_ASSOC);

        return $datos;
    }

}
