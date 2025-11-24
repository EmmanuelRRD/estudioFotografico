<?php 
include_once('../database/conexion_bd_escuela.php');

$con = new ConexionBDEscuela();
$conexion = $con->getConexion();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $cadenaJSON = file_get_contents('php://input');

    if(!$cadenaJSON){
        echo "No hay contenido JSON";
    }else{
        
        $consulta_con_filtros = json_decode($cadenaJSON,true);
        $filtro_pa = $consulta_con_filtros['pa'];
        $sql = 'SELECT * FROM alumnos';
        $res = mysqli_query($conexion,$sql);
        $respuesta['alumnos'] = array();

        if($res){
            while($fila = mysqli_fetch_assoc($res)){
                $alumno = array();
                $alumno['nc'] = $fila['Num_Control'];
                $alumno['n'] = $fila['Nombre'];
                $alumno['pa'] = $fila['Primer_Ap'];
                $alumno['sa'] = $fila['Segundo_Ap'];
                $alumno['f'] = $fila['Fecha_Nac'];
                $alumno['s'] = $fila['Semestre'];
                $alumno['c'] = $fila['Carrera'];
                array_push($respuesta['alumnos'], $alumno);
            }
            $respuesta['consulta'] = true;
        }else{
            $respuesta['consulta'] = false;
        }
        
        $respuestaJSON = json_encode($respuesta);

        echo $respuestaJSON;
    }


}