<?php 
include_once('../database/conexion_bd_escuela.php');

$con = new ConexionBDEscuela();
$conexion = $con->getConexion();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cadenaJSON = file_get_contents('php://input');

    if($cadenaJSON==false){
        echo "No hay cadena JSON";
    }else{
        $datos_alumno = json_decode($cadenaJSON,true);

        $nc = $datos_alumno['nc'];
        $n = $datos_alumno['n'];
        $pa = $datos_alumno['pa'];
        $sa = $datos_alumno['sa'];
        $f = $datos_alumno['f'];
        $s = $datos_alumno['s'];
        $c = $datos_alumno['c'];
        
        $sql = "INSERT INTO alumnos VALUES ('$nc', '$n','$pa','$sa','$f','$s','$c')";

        $res = mysqli_query($conexion, $sql);

        $respuesta  = array();

        if($res){
            $respuesta['alta'] = true;
        }else{
            $respuesta['alta'] = false;
        }

        $respuestaJSON = json_encode($respuesta);
        echo "$respuestaJSON";
    }
}