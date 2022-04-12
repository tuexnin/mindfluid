<?php

require '../config/conexion.php';

/**
 * Description of Servicios
 *
 * @author EdwinCR
 */
class Servicios {

    public function __construct() {
        
    }

    public function insertar($titulo, $contenido) {
        $sql = "INSERT INTO servicios (nombre, contenido)
		VALUES ('$titulo','$contenido')";
        return ejecutarConsulta($sql);
    }

    public function editar($idservicios, $titulo, $contenido) {
        $sql = "UPDATE servicios SET nombre='$titulo', contenido='$contenido' WHERE idservicios='$idservicios'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idservicios) {
        $sql = "SELECT * FROM servicios WHERE idservicios='$idservicios'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar() {
        $sql = "SELECT * FROM servicios";
        return ejecutarConsulta($sql);
    }

}
