<?php

require_once "../modelos/Marcas.php";

$marcas = new Marcas();

$idmarca = isset($_POST["idmarca"]) ? limpiarCadena($_POST["idmarca"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$estado = isset($_POST["estado"]) ? limpiarCadena($_POST["estado"]) : "";
$imagen = isset($_POST["imagen"]) ? limpiarCadena($_POST["imagen"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $imagen = $_POST["imagenactual"];
        } else {
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/marcas/" . $imagen);
            }
        }
        
        if (empty($idmarca)) {
            $rspta = $marcas->insertar($pri_nombre, $sec_nombre, $ap_paterno, $ap_materno, $dni, $correo, $carrera, $descripcion, $imagen);
            if ($rspta) {
                $busca = $personal->validarDni($dni);
                if ($busca == 25) {
                    echo "Persona no existe, error al registrar";
                } else {
                    $respertne = $pertenece->insertar($busca["id"], $categoria, $cargo, $estado);
                    echo $respertne ? "Personal registrado" : "Personal no se pudo registrar";
                }
            } else {
                echo "Personal no se pudo registrar2";
            }
        } else {
            $rspta = $personal->editar($idpersonal, $pri_nombre, $sec_nombre, $ap_paterno, $ap_materno, $dni, $correo, $carrera, $descripcion, $imagen);
            $respertne = $pertenece->editar($idpertenece, $idpersonal, $categoria, $cargo, $estado);
            echo $rspta && $respertne ? "Personal actualizado" : "Personal no se pudo actualizar";
        }
        break;
}
?>