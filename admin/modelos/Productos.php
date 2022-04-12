<?php

require '../config/conexion.php';

class Productos {
    
    public function __construct() {
        
    }
    
    public function ultimoid() {
        return ultimoid();
    }
    
    public function insertar($nombre, $resumen, $descripcion, $seo, $plista, $pventa, $idmarcas ,$idcategoria, $foto) {
        $sql = "INSERT INTO producto (nombre, resumen, descripcion, descripcionseo, preciolista, precioventa, fecpublicacion, idcategoria, idmarcas, foto)
		VALUES ('$nombre','$resumen','$descripcion', '$seo', '$plista', '$pventa', CURDATE(),'$idcategoria', '$idmarcas', '$foto')";
        return ejecutarConsulta($sql);
    }

    public function editar($idproducto, $nombre, $resumen, $descripcion, $seo, $plista, $pventa, $idmarcas ,$idcategoria, $imagen) {
        $sql = "UPDATE producto SET nombre='$nombre', resumen='$resumen', descripcion='$descripcion', descripcionseo='$seo', preciolista='$plista', precioventa='$pventa', idcategoria='$idcategoria', idmarcas='$idmarcas', foto='$imagen' WHERE idproducto='$idproducto'";
        return ejecutarConsulta($sql);
    }

    
    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idproducto) {
        $sql = "SELECT p.idproducto, p.nombre, p.resumen, p.descripcion, p.descripcionseo, p.preciolista, p.precioventa, c.idcategoria AS categoria ,m.idmarcas AS marca
FROM producto p
INNER JOIN marcas m
ON m.idmarcas = p.idmarcas
INNER JOIN categoria c
ON c.idcategoria = p.idcategoria
WHERE p.idproducto='$idproducto'";
        return ejecutarConsultaSimpleFila($sql);
    }
    
    public function listar() {
        $sql="SELECT p.idproducto, p.nombre, p.resumen, c.nombre AS categoria ,m.nombre AS marca
FROM producto p
INNER JOIN marcas m
ON m.idmarcas = p.idmarcas
INNER JOIN categoria c
ON c.idcategoria = p.idcategoria;";
        return ejecutarConsulta($sql);
    }
}
