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
        $columnas = implode(", ", array_keys($valores));
        $placeholders = implode(", ", array_fill(0, count($valores), "?"));

        $sql = "INSERT INTO $tabla ($columnas) VALUES ($placeholders)";
        $stmt = $this->conexion->getConexion()->prepare($sql);

        $tipos = str_repeat("s", count($valores)); // todos string
        $stmt->bind_param($tipos, ...array_values($valores));

        if ($stmt->execute()) {
            echo "Alumno agregado correctamente.";
        } else {
            echo "Error al agregar alumno: " . mysqli_error($this->conexion->getConexion());
        }
    }

    //------------ Eliminar -----------
    public function eliminarRegistro($key, $id, $tabla)
    {
        // Que sis se puede eliminar
        $tablasPermitidas = [
            'estudio',
            'usuario',
            'equipo_trabajo',
            'evento',
            'material',
            'material_necesario',
            'nota',
            'usuario_equipo'
        ];

        $keysPermitidos = [
            'id_estudio',
            'id_usuario',
            'id_equipo',
            'id_evento',
            'id_material',
            'id_detalle',
            'id_nota'
        ];

        if (!in_array($tabla, $tablasPermitidas)) {
            throw new Exception("Tabla no permitida");
        }

        if (!in_array($key, $keysPermitidos)) {
            throw new Exception("Columna no permitida");
        }

        // 2) Prepared statement seguro
        $sql = "DELETE FROM $tabla WHERE $key = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);

        if (!$stmt) {
            throw new Exception("Error al preparar: " . $this->conexion->getConexion()->error);
        }

        $stmt->bind_param("s", $id);

        // 4) Ejecutar
        $stmt->execute();

        return $stmt->affected_rows > 0;
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
        $set = implode(", ", array_map(fn($k) => "$k = ?", array_keys($valores)));

        $sql = "UPDATE $tabla SET $set WHERE $key = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);

        $tipos = str_repeat("s", count($valores) + 1);

        $params = array_values($valores);
        $params[] = $id;

        $stmt->bind_param($tipos, ...$params);

        if ($stmt->execute()) {
            echo "Actualización exitosa";
        } else {
            echo "Error: " . mysqli_error($this->conexion->getConexion());
        }
    }

    public function mostrarEspecifico($tabla, $key, $id)
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

    //------------ Mostrar Fotografos Disponibles -----------
    public function mostrarFotografos()
    {
        /*
        SELECT a.id, a.valor, b.dato
        FROM tablaA a
        INNER JOIN tablaB b ON a.id = b.id
        WHERE a.valor = 'B';

        //Esta consulta es estatica ya que todos los clientes deben de 
        */
    }
}
