<?php

include_once('../../database/conexion_bd_escuela.php');

class AlumnoDAO
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionBDEscuela();
    }

    //=================== Metodos abcc (CRUD) =================

    //------------- Altas ----------
    public function agregarAlumno($id, $name, $primerAp, $segundoAp, $fechaNac, $semestre, $carrera)
    {
        $sql = "INSERT INTO alumnos VALUES('$id','$name','$primerAp','$segundoAp','$fechaNac','$semestre','$carrera')";

        $res = mysqli_query($this->conexion->getConexion(), $sql);

        return $res;
    }

    //------------ Eliminar -----------
    public function eliminarRegistro($key, $id, $tabla)
    {
        $sql = "DELETE FROM $tabla WHERE $key='$id'";
        return mysqli_query($this->conexion->getConexion(), $sql);
    }

    //------------ Consultas -----------
    public function mostrar($tabla)
    {
        $sql = "SELECT * FROM $tabla";

        $res = mysqli_query($this->conexion->getConexion(), $sql);

        $datos = mysqli_fetch_all($res, MYSQLI_ASSOC);

        return $datos;
    }

    //------------ Actualizar -----------
    public function actualizar($key, $id, $tabla, $valores)
    {
        // Construimos la parte SET del UPDATE
        $set = [];
        foreach ($valores as $campo => $valor) {
            $set[] = "$campo = '" . addslashes($valor) . "'";
        }
        $set_str = implode(", ", $set);

        // Armamos la sentencia SQL final
        $sql = "UPDATE $tabla SET $set_str WHERE $key = '" . addslashes($id) . "'";

        // Ejecutamos la consulta (si tienes una conexión mysqli)
        $res = mysqli_query($this->conexion->getConexion(), $sql);

        if ($res) {
            echo "Actualización exitosa";
        } else {
            echo "Error: " . mysqli_error($this->conexion->getConexion());
        }
    }
}
