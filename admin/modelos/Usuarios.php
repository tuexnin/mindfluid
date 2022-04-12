<?php

require '../config/conexion.php';

/**
 * Description of Usuarios
 *
 * @author EdwinCR
 */
class Usuarios {

    public function __construct() {
        
    }

    public function insertar($nombre, $usuario, $pass) {
        $sql = "INSERT INTO usuarios (nombre,usuario,pass,estado)
		VALUES ('$nombre','$usuario','$pass','1')";
        return ejecutarConsulta($sql);
    }

    public function editar($idusuarios, $nombre, $usuario, $pass) {
        $sql = "UPDATE usuarios SET nombre='$nombre', usuario='$usuario', pass='$pass' WHERE idusuarios='$idusuarios'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar registros
    public function desactivar($idusuarios) {
        $sql = "UPDATE usuarios SET estado='0' WHERE idusuarios='$idusuarios'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar registros
    public function activar($idusuarios) {
        $sql = "UPDATE usuarios SET estado='1' WHERE idusuarios='$idusuarios'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idusuarios) {
        $sql = "SELECT * FROM usuarios WHERE idusuarios='$idusuarios'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar() {
        $sql = "SELECT * FROM usuarios";
        return ejecutarConsulta($sql);
    }

}
