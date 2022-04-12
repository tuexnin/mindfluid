<?php

require '../config/conexion.php';

class ProImagen {
    
    
    public function __construct() {
        
    }
    
    public function insertar($imagen, $idproducto) {
        $sql = "INSERT INTO productoimagen (url, idproducto)
		VALUES ('$imagen','$idproducto')";
        return ejecutarConsulta($sql);
    }
    
    public function editar($idproductoimg, $imagen, $idproducto) {
        $sql = "UPDATE productoimagen SET url='$imagen', idproducto='$idproducto' WHERE idproductoimagen='$idproductoimg'";
        return ejecutarConsulta($sql);
    }
    
    public function mostrar($idproducto) {
        $sql = "SELECT img.idproductoimagen, img.url FROM productoimagen img
INNER JOIN producto p
ON p.idproducto = img.idproducto
WHERE img.idproducto='$idproducto'";
        return ejecutarConsulta($sql);
    }
}
