<?php

require '../config/conexion.php';

$servicio = isset($_GET['id']) ? $_GET['id'] : "";
if (empty($servicio)) {
    $consultaServicios = "select * from contenido where tipo='servicio'";
    $respuestaServicios = ejecutarConsulta($consultaServicios);
} else {
    $consultaServicios = "select * from contenido where idblog='$servicio'";
    $traerServicios = ejecutarConsulta($consultaServicios);
}
?>
