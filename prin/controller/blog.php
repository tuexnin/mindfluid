<?php

require '../config/conexion.php';

$blog = isset($_GET['id']) ? $_GET['id'] : "";
if (empty($blog)) {
    $consultaBlog = "select * from contenido where tipo='blog'";
    $respuestaBlog = ejecutarConsulta($consultaBlog);
} else {
    $consultaBlog = "select * from contenido where idblog='$blog'";
    $traerBlog = ejecutarConsulta($consultaBlog);
}
?>
