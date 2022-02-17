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
            $rspta = $marcas->insertar($nombre, $imagen, $estado);
            echo $rspta ? "Marca registrada" : "Marca no se pudo registrar";
        } else {
            $rspta = $marcas->editar($idmarca, $nombre, $imagen, $estado);

            echo $rspta ? "Marca actualizado" : "Marca no se pudo actualizar";
        }
        break;

    case 'desactivar':
        $rspta = $marcas->desactivar($idmarca);
        echo $rspta ? "Marca Desactivada" : "Marca no se puede desactivar";
        break;

    case 'activar':
        $rspta = $marcas->activar($idmarca);
        echo $rspta ? "Marca activada" : "Marca no se puede activar";
        break;

    case 'mostrar':
        $rspta = $marcas->mostrar($idmarca);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    
    case 'listar':
        $rspta = $marcas->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->nombre,
                "1" => "<img src='../files/marcas/" . $reg->imagen . "' height='50px' width='50px' >",
                "2" => $reg->fecha,
                "3" => $reg->estado == '1' ? '<a href="#" onclick="desactivar('. $reg->idmarcas .')" class="badge badge-success">Activo</a>' : '<a href="#" onclick="activar('. $reg->idmarcas .')" class="badge badge-danger">Inactivo</a>',
                "4" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idmarcas . ')"><i class="fa fa-pencil">Editar</i></button>'
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data);
        echo json_encode($results);

        break;
        
    case 'selectMarca':
        $rspta = $marcas->listar();
        while ($reg = $rspta->fetch_object()){
            echo "<option value='.$reg->idmarcas.'>$reg->nombre</option>";
        }
        
        break;
}
?>