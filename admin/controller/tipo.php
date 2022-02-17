<?php

require_once "../modelos/Tipo.php";

$tipo = new Tipo();

$idtipo = isset($_POST["idtipo"]) ? limpiarCadena($_POST["idtipo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':

        if (empty($idtipo)) {
            $rspta = $tipo->insertar($nombre);
            echo $rspta ? "Tipo registrado" : "Tipo no se pudo registrar";
        } else {
            $rspta = $tipo->editar($idtipo, $nombre);

            echo $rspta ? "Tipo actualizado" : "Tipo no se pudo actualizar";
        }
        break;

    case 'mostrar':
        $rspta = $tipo->mostrar($idtipo);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    
    case 'listar':
        $rspta = $tipo->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->nombre,
                "1" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idtipo . ')"><i class="fa fa-pencil">Editar</i></button>'
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data);
        echo json_encode($results);

        break;
        
    case 'selectTipo':
        $rspta = $tipo->listar();
        while ($reg = $rspta->fetch_object()){
            echo "<option value='.$reg->idtipo.'>".$reg->nombre."</option>";
        }
        
        break;
    
}
?>