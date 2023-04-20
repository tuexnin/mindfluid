<?php

require '../config/conexion.php';

/**
 * Description of Config
 *
 * @author EdwinCR
 */
class Config {
    
    public function __construct() {
        
    }


    public function insertar($wsp, $fb, $telefono, $correo, $linken, $direccion, $correorespuesta, $acerca, $catalogo, $mapa) {
        $sql = "INSERT INTO configuracion (wsp, fb, telefono, correo, linken, direccion, correorespuesta, acerca, catalogo, mapa)
		VALUES ('$wsp', '$fb','$telefono', '$correo','$linken','$direccion', '$correorespuesta', '$acerca', '$catalogo', '$mapa')";
        return ejecutarConsulta($sql);
    }

    public function editar($idconfiguracion, $wsp, $fb, $telefono, $correo, $linken, $direccion, $correorespuesta, $acerca, $catalogo, $mapa) {
        $sql = "UPDATE configuracion SET wsp='$wsp', fb='$fb',telefono='$telefono', correo='$correo',linken='$linken', direccion='$direccion', correorespuesta='$correorespuesta', acerca='$acerca', catalogo='$catalogo', mapa='$mapa' WHERE idconfiguracion='$idconfiguracion'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar() {
        $sql = "SELECT * FROM configuracion where idconfiguracion=1";
        return ejecutarConsultaSimpleFila($sql);
    }

    
}
