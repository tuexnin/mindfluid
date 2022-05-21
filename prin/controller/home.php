<?php

require '../config/conexion.php';

$sql = "SELECT * FROM tipo";

$respueta = ejecutarConsulta($sql);

$sql = "SELECT s.idservicios, s.nombre FROM servicios s";

//$respueta2 = ejecutarConsulta($sql);

$sql = "SELECT p.idproducto, p.nombre, p.fecpublicacion, p.resumen, p.foto FROM producto p ORDER BY p.idproducto DESC LIMIT 4";
$respuesta3 = ejecutarConsulta($sql);


?>
