<?php

require '../config/conexion.php';

class Productos {
    public function __construct() {
        
    }

    public function insertar() {
        $sql = "INSERT INTO categoria (nombre, idtipo)
		VALUES ('$nombre','$tipo')";
        return ejecutarConsulta($sql);
    }

    public function editar($idcategoria, $nombre, $tipo) {
        $sql = "UPDATE categoria SET nombre='$nombre', idtipo='$tipo' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }

    
    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idcategoria) {
        $sql = "SELECT c.idcategoria, c.nombre as categoria, t.idtipo, t.nombre as tipo FROM categoria c INNER JOIN tipo t ON t.idtipo=c.idtipo WHERE idcategoria='$idcategoria'";
        return ejecutarConsultaSimpleFila($sql);
    }
    
    public function listar() {
        $sql="SELECT c.idcategoria ,c.nombre, t.nombre as tipo FROM categoria c INNER JOIN tipo t ON t.idtipo=c.idtipo";
        return ejecutarConsulta($sql);
    }
}
