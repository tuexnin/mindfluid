<?php

require '../config/conexion.php';

/**
 * Description of Blog
 *
 * @author EdwinCR
 */
class Soluciones {

    public function __construct() {
        
    }


    public function insertar($tipo, $imagen, $titulo, $seo, $contenido) {
        $sql = "INSERT INTO contenido (tipo, portada, titulo, seo,contenido, fecpublicacion)
		VALUES ('$tipo', '$imagen','$titulo', '$seo','$contenido',CURDATE())";
        return ejecutarConsulta($sql);
    }

    public function editar($idblog, $tipo, $imagen, $titulo, $seo, $contenido) {
        $sql = "UPDATE contenido SET tipo='$tipo', portada='$imagen',titulo='$titulo', seo='$seo',contenido='$contenido' WHERE idblog='$idblog'";
        return ejecutarConsulta($sql);
    }

    public function activar($idblog) {
        $sql = "UPDATE contenido SET estado='0' WHERE idblog='$idblog'";
        return ejecutarConsulta($sql);
    }
    
    public function desactivar($idblog) {
        $sql = "UPDATE contenido SET estado='1' WHERE idblog='$idblog'";
        return ejecutarConsulta($sql);
    }
    
    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idblog) {
        $sql = "SELECT * FROM contenido WHERE idblog='$idblog'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar() {
        $sql = "SELECT * FROM contenido WHERE tipo='soluciones'";
        return ejecutarConsulta($sql);
    }

}
