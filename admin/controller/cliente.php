<?php

require_once "../modelos/Cliente.php";

$cliente = new Cliente();

$idcliente = isset($_POST["idcliente"]) ? limpiarCadena($_POST["idcliente"]) : "";
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
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/cliente/" . $imagen);
            }
        }

        if (empty($idcliente)) {
            $rspta = $cliente->insertar($nombre, $imagen);
            echo $rspta ? "Cliente registrado" : "Cliente no se pudo registrar";
        } else {
            $rspta = $cliente->editar($idcliente, $nombre, $imagen);

            echo $rspta ? "Cliente actualizado" : "Cliente no se pudo actualizar";
        }
        break;

    case 'desactivar':
        $rspta = $cliente->desactivar($idcliente);
        echo $rspta ? "Cliente Desactivado" : "Cliente no se puede desactivar";
        break;

    case 'activar':
        $rspta = $cliente->activar($idcliente);
        echo $rspta ? "Cliente activado" : "Cliente no se puede activar";
        break;

    case 'mostrar':
        $rspta = $cliente->mostrar($idcliente);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    
    case 'listar':
        $rspta = $cliente->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idcliente . ')"><i class="fas fa-edit"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->fecha,
                "3" => "<img src='../files/cliente/" . $reg->imagen . "' height='50px' width='50px' >",
                "4" => $reg->estado == '1' ? '<a href="#" onclick="desactivar('. $reg->idcliente .')" class="badge badge-success">Activo</a>' : '<a href="#" onclick="activar('. $reg->idcliente .')" class="badge badge-danger">Inactivo</a>'
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
