<?php

require_once "../modelos/Usuarios.php";

$usuarios = new Usuarios();

$idusuarios = isset($_POST["idusuarios"]) ? limpiarCadena($_POST["idusuarios"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$user = isset($_POST["user"]) ? limpiarCadena($_POST["user"]) : "";
$pss = isset($_POST["pss"]) ? limpiarCadena($_POST["pss"]) : "";
$estado = isset($_POST["estado"]) ? limpiarCadena($_POST["estado"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':
        $encrip = hash('md5', $pss);
        if (empty($idusuarios)) {
            
            $rspta = $usuarios->insertar($nombre, $user, $encrip);
            echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
        } else {
            $rspta = $usuarios->editar($idusuarios, $nombre, $user, $encrip);

            echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
        }
        break;

    case 'desactivar':
        $rspta = $usuarios->desactivar($idusuarios);
        echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
        break;

    case 'activar':
        $rspta = $usuarios->activar($idusuarios);
        echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
        break;

    case 'mostrar':
        $rspta = $usuarios->mostrar($idusuarios);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    
    case 'listar':
        $rspta = $usuarios->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idusuarios . ')"><i class="fa fa-pencil">Editar</i></button>',
                "1" => $reg->nombre,
                "2" => $reg->usuario,
                "3" => $reg->estado == '1' ? '<a href="#" onclick="desactivar('. $reg->idusuarios .')" class="badge badge-success">Activo</a>' : '<a href="#" onclick="activar('. $reg->idusuarios .')" class="badge badge-danger">Inactivo</a>'
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data);
        echo json_encode($results);

        break;
        
}
?>

