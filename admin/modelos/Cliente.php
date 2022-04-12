<?php

require '../config/conexion.php';

/**
 * Description of Cliente
 *
 * @author EdwinCR
 */
class Cliente {

    public function __construct() {
        
    }

    public function insertar($nombre, $imagen) {
        $sql = "INSERT INTO cliente (nombre,imagen,fecha,estado)
		VALUES ('$nombre','$imagen',CURDATE(),'1')";
        return ejecutarConsulta($sql);
    }

    public function editar($idcliente, $nombre, $imagen) {
        $sql = "UPDATE cliente SET nombre='$nombre',imagen='$imagen' WHERE idcliente='$idcliente'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar registros
    public function desactivar($idcliente) {
        $sql = "UPDATE cliente SET estado='0' WHERE idcliente='$idcliente'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar registros
    public function activar($idcliente) {
        $sql = "UPDATE cliente SET estado='1' WHERE idcliente='$idcliente'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idcliente) {
        $sql = "SELECT * FROM cliente WHERE idcliente='$idcliente'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar() {
        $sql = "SELECT * FROM cliente";
        return ejecutarConsulta($sql);
    }

}
