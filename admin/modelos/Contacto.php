<?php

require '../config/conexion.php';

/**
 * Description of Contacto
 *
 * @author EdwinCR
 */
class Contacto {

    public function __construct() {
        
    }


    public function insertar($producto, $persona, $email, $telefono, $asunto, $mensaje) {
        $sql = "INSERT INTO contactenos (producto, persona, email, telefono, asunto, mensaje)
		VALUES ('$producto', '$persona','$email', '$telefono','$asunto','$mensaje')";
        return ejecutarConsulta($sql);
    }
    
    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idcontactenos) {
        $sql = "SELECT * FROM contactenos WHERE idcontactenos='$idcontactenos'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar() {
        $sql = "SELECT * FROM contactenos";
        return ejecutarConsulta($sql);
    }

}
