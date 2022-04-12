<?php

require_once "../modelos/Categoria.php";

$categoria = new Categoria();

$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$tipo = isset($_POST["tipo"]) ? limpiarCadena($_POST["tipo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':

        if (empty($idcategoria)) {
            $rspta = $categoria->insertar($nombre,$tipo);
            echo $rspta ? "Categoria registrada" : "Categoria no se pudo registrar";
        } else {
            $rspta = $categoria->editar($idcategoria, $nombre, $tipo);

            echo $rspta ? "Categoria actualizada" : "Categoria no se pudo actualizar";
        }
        break;

    case 'mostrar':
        $rspta = $categoria->mostrar($idcategoria);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    
    case 'listar':
        $rspta = $categoria->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->nombre,
                "1" => $reg->tipo,
                "2" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idcategoria . ')"><i class="fa fa-pencil">Editar</i></button>'
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data);
        echo json_encode($results);

        break;
        
    case 'selectCategoria':
        $rspta = $categoria->listar();
        while ($reg = $rspta->fetch_object()){
            echo "<option value='$reg->idcategoria'>$reg->nombre</option>";
        }
        
        break;
}
?>