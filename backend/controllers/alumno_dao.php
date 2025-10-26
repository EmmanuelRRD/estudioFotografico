<?php

    include_once('../../database/conexion_bd_escuela.php');

    class AlumnoDAO{
        private $conexion;

        public function __construct(){
            $this-> conexion = new ConexionBDEscuela();
        }
            
        //=================== Metodos abcc (CRUD) =================

        //------------- Altas ----------

        public function agregarAlumno($id, $name, $primerAp, $segundoAp, $fechaNac, $semestre, $carrera){
            $sql = "INSERT INTO alumnos VALUES('$id','$name','$primerAp','$segundoAp','$fechaNac','$semestre','$carrera')";

            $res = mysqli_query($this-> conexion->getConexion(),$sql);

            return $res;
        }

        //------------ Cambios -----------


        //------------ Consultas -----------
        public function mostrar($tabla){
            $sql = "SELECT * FROM $tabla";

            $res = mysqli_query($this-> conexion->getConexion(),$sql);

            $datos = mysqli_fetch_all($res, MYSQLI_ASSOC);

            return $datos;
        }
    }

?>