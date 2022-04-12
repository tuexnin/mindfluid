<?php

require '../config/conexion.php';

/**
 * Description of Blog
 *
 * @author EdwinCR
 */
class Blog {

    public function __construct() {
        
    }


    public function insertar($titulo, $contenido) {
        $sql = "INSERT INTO blog (titulo, contenido, fecpublicacion)
		VALUES ('$titulo','$contenido',CURDATE())";
        return ejecutarConsulta($sql);
    }

    public function editar($idblog, $titulo, $contenido) {
        $sql = "UPDATE blog SET titulo='$titulo', contenido='$contenido' WHERE idblog='$idblog'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idblog) {
        $sql = "SELECT * FROM blog WHERE idblog='$idblog'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar() {
        $sql = "SELECT * FROM blog";
        return ejecutarConsulta($sql);
    }

}
