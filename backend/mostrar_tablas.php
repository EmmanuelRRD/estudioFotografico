<?php
//../backend/mostrar_tablas.php
include_once('./controllers/procesar_altas.php');

if (isset($_GET['tabla'])) {
    $tabla = $_GET['tabla'];
    echo "<div class='alert alert-info'>Has seleccionado la tabla: <strong>$tabla</strong></div>";
} else {
    echo "No se seleccionó ninguna tabla.";
}