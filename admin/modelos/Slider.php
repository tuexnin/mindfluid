<?php

require '../config/conexion.php';

/**
 * Description of Slider
 *
 * @author EdwinCR
 */
class Slider {

    public function __construct() {
        
    }

    public function insertar($imagen1, $imagen2, $imagen3, $titulo1, $titulo2, $titulo3, $texto1, $texto2, $texto3, $url1, $url2, $url3) {
        $sql = "INSERT INTO slider (imagen1, imagen2, imagen3, titulo1, titulo2, titulo3, texto1, texto2, texto3, url1, url2, url3)
		VALUES ('$imagen1', '$imagen2','$imagen3', '$titulo1','$titulo2','$titulo3', '$texto1', '$texto2', '$texto3', '$url1', '$url2', '$url3')";
        return ejecutarConsulta($sql);
    }

    public function editar($idslider ,$imagen1, $imagen2, $imagen3, $titulo1, $titulo2, $titulo3, $texto1, $texto2, $texto3, $url1, $url2, $url3) {
        $sql = "UPDATE slider SET imagen1='$imagen1', imagen2='$imagen2',imagen3='$imagen3', titulo1='$titulo1',titulo2='$titulo2', titulo3='$titulo3', texto1='$texto1', texto2='$texto2', texto3='$texto3', url1='$url1', url2='$url2', url3='$url3' WHERE idslider='$idslider'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar() {
        $sql = "SELECT * FROM slider where idslider=1";
        return ejecutarConsultaSimpleFila($sql);
    }

}
