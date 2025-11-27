<?php

include_once('../database/conexion_bd_escuela.php');

class ClienteDAO
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionBDEscuela();
    }

    //=================== Metodos abcc (CRUD) =================

    //------------- Mostrar ----------
    public function mostrarJoin($fotografo)
    {
        $sql = "SELECT 
        u.id_usuario,
        CONCAT(u.nombre, ' ', u.primer_ap, ' ', u.segundo_ap) AS fotografo,
        u.tipo_usuario,
        e.fecha_reunion,
        e.paquete
    FROM usuario u
    INNER JOIN usuario_equipo ue 
        ON u.id_usuario = ue.id_usuario
    INNER JOIN equipo_trabajo eq
        ON ue.id_equipo = eq.id_equipo
    INNER JOIN evento e 
        ON e.id_equipo = eq.id_equipo
    WHERE u.tipo_usuario = 'empleado'
      AND CONCAT(u.nombre, ' ', u.primer_ap, ' ', u.segundo_ap) LIKE ?
    ORDER BY e.fecha_reunion";

        $stmt = $this->conexion->getConexion()->prepare($sql);

        $pattern = "%$fotografo%"; // lo que el usuario escriba
        $stmt->bind_param("s", $pattern);

        $stmt->execute();

        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}
