<?php

require '../config/conexion.php';

Class Marcas {

    public function __construct() {
        
    }

    public function insertar($nombre, $imagen, $estado) {
        $sql = "INSERT INTO marcas (nombre,imagen,fecha,estado)
		VALUES ('$nombre','$imagen',CURDATE(),'$estado')";
        return ejecutarConsulta($sql);
    }

    public function editar($idmarcas, $nombre, $imagen, $estado) {
        $sql = "UPDATE marcas SET nombre='$nombre',imagen='$imagen',estado='$estado' WHERE idmarcas='$idmarcas'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar registros
    public function desactivar($idmarcas) {
        $sql = "UPDATE marcas SET estado='0' WHERE idmarcas='$idmarcas'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar registros
    public function activar($idmarcas) {
        $sql = "UPDATE marcas SET estado='1' WHERE idmarcas='$idmarcas'";
        return ejecutarConsulta($sql);
    }
    
    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idmarcas) {
        $sql = "SELECT * FROM marcas WHERE idmarcas='$idmarcas'";
        return ejecutarConsultaSimpleFila($sql);
    }
    
    public function listar() {
        $sql="SELECT * FROM marcas";
        return ejecutarConsulta($sql);
    }
    
}

?>