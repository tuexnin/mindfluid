<?php

require '../config/conexion.php';

$solucion = isset($_GET['id']) ? $_GET['id'] : "";
if (empty($solucion)) {
    $consultaSolucion = "select * from contenido where tipo='soluciones'";
    $respuestaSolucion = ejecutarConsulta($consultaSolucion);
} else {
    $consultaSolucion = "select * from contenido where idblog='$solucion'";
    $traerSolucion = ejecutarConsulta($consultaSolucion);
}
?>
