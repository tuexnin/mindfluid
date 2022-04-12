<?php

require_once "../modelos/Servicios.php";

$servicios = new Servicios();

$idservicios = isset($_POST["idservicios"]) ? limpiarCadena($_POST["idservicios"]) : "";
$titulo = isset($_POST["titulo"]) ? limpiarCadena($_POST["titulo"]) : "";
$contenido = isset($_POST["cont"]) ? $_POST["cont"] : "";


switch ($_GET["op"]) {
    case 'guardaryeditar':
        
        if (empty($idservicios)) {
            $rspta = $servicios->insertar($titulo, $contenido);
            echo $rspta ? 'Servicio Registrado' : 'Servicio no se puedo registrar';
        } else {
            $rspta = $servicios->editar($idservicios, $titulo, $contenido);
            echo $rspta ? 'Servicio actualizado' : 'Servicio no se pudo actualizar';
        }
        break;

    case 'mostrar':
        $rspta = $servicios->mostrar($idservicios);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $servicios->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idservicios . ')"><i class="fa fa-pencil">Editar</i></button>',
                "1" => $reg->nombre,
                "2" => $reg->contenido
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


