<?php

require '../config/conexion.php';

Class Marcas{
    public function __construct() {
        
    }
    
    public function insertar($nombre,$imagen, $estado) {
        $sql = "INSERT INTO marcas (nombre,imagen,fecha,estado)
		VALUES ('$nombre','$imagen','','$estado')";
        return ejecutarConsulta($sql);
    }
}

?>