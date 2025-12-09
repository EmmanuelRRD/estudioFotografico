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

        try {
            $stmt->execute();
            echo "Agregado correctamente.";
        } catch (mysqli_sql_exception $e) {
            switch ($e->getCode()) {
                case 1062:
                    echo "Error: El identificador ya existe.";
                    break;
                case 1452:
                    echo "Error: No existe ese identificador.";
                    break;
                default:
                    echo "Error al agregar: " . $e->getMessage();
                    break;
            }
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
            echo json_encode(["status" => "ok"]);
        } else {
            echo json_encode(["Error" => mysqli_error($this->conexion->getConexion())]);
        }
    }

    public function mostrarEspecifico($tabla, $key, $id)
    {
        $con = $this->conexion->getConexion();

        // Sanitizar nombres (solo evitar inyección en nombres, no se puede usar bind_param para eso)
        $tabla = mysqli_real_escape_string($con, $tabla);
        $key   = mysqli_real_escape_string($con, $key);

        // LIKE %id%
        $like = "%" . $id . "%";

        // Usar consulta preparada
        $sql = "SELECT * FROM $tabla WHERE $key LIKE ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $like);
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
