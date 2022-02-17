<?php

require '../config/conexion.php';

Class Tipo {

    public function __construct() {
        
    }

    public function insertar($nombre) {
        $sql = "INSERT INTO tipo (nombre)
		VALUES ('$nombre')";
        return ejecutarConsulta($sql);
    }

    public function editar($idtipo, $nombre) {
        $sql = "UPDATE tipo SET nombre='$nombre' WHERE idtipo='$idtipo'";
        return ejecutarConsulta($sql);
    }

    
    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idtipo) {
        $sql = "SELECT * FROM tipo WHERE idtipo='$idtipo'";
        return ejecutarConsultaSimpleFila($sql);
    }
    
    public function listar() {
        $sql="SELECT * FROM tipo";
        return ejecutarConsulta($sql);
    }
    
}

?>