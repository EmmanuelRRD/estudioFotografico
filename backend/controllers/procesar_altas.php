<?php
    include_once('./alumno_dao.php');

    $alumnoDAO = new AlumnoDAO();

    $id = $_POST['caja_num_control'];
    $nm = $_POST['caja_nombre'];
    $pap = $_POST['caja_primer_ap'];

    $sap = $_POST['caaj_segundo_ap'];//Linea que genera el error
    $fc = $_POST['caja_fecha_nac'];
    $s = $_POST['caja_semestre'];
    $c = $_POST['caja_carrera'];

    $datos_correctos = true;

    // var_dump($id);
    // var_dump($nm);
    // var_dump($pap);
    // var_dump($sap);
    // var_dump($fc);
    // var_dump($s);
    // var_dump($c);

    if($datos_correctos){
        $res = $alumnoDAO->agregarAlumno($id,$nm,$pap,$sap,$fc,$s,$c);

        if($res){
            echo  "ISC casi inmortal";
        }else{
            echo "Mejor me dedico a redes";
        }
    }   

?>