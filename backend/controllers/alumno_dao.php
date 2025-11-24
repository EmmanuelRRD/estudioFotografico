<?php

include_once('../database/conexion_bd_escuela.php');

class AlumnoDAO
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionBDEscuela();
    }

    //=================== Metodos abcc (CRUD) =================

    //------------- Altas ----------
    public function agregar($tabla, $valores)
    {

        $campos = array_keys($valores);
        $valoresEscapados = array_map(fn($v) => "'" . addslashes($v) . "'", array_values($valores));

        $columnas = implode(", ", $campos);
        $valores_str = implode(", ", $valoresEscapados);

        $sql = "INSERT INTO $tabla ($columnas) VALUES ($valores_str)";

        $res = mysqli_query($this->conexion->getConexion(), $sql);

        if ($res) {
            echo "Alumno agregado correctamente.";
        } else {
            echo "Error al agregar alumno: " . mysqli_error($this->conexion->getConexion());
        }
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

    public function actualizarEspecifico($tabla, $key, $id)
    {
        // Validar tabla y campo (evita inyección SQL)
        $tabla = mysqli_real_escape_string($this->conexion->getConexion(), $tabla);
        $key   = mysqli_real_escape_string($this->conexion->getConexion(), $key);
        $like = "$id%";

        $sql = "SELECT * FROM $tabla WHERE $key LIKE '$like'";

        $stmt = $this->conexion->getConexion()->prepare($sql);

        $stmt->execute();

        $res = $stmt->get_result();
        $datos = $res->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $datos;
    }
}
