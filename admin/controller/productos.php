<?php

require_once "../modelos/Productos.php";

$productos = new Productos();

$idproductos = isset($_POST["idproductos"]) ? limpiarCadena($_POST["idproductos"]) : "";
$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$resumen = isset($_POST["resumen"]) ? limpiarCadena($_POST["resumen"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$seo = isset($_POST["seo"]) ? limpiarCadena($_POST["seo"]) : "";
$plista = isset($_POST["plista"]) ? limpiarCadena($_POST["plista"]) : "";
$pventa = isset($_POST["pventa"]) ? limpiarCadena($_POST["pventa"]) : "";
$idmarcas = isset($_POST["idmarcas"]) ? limpiarCadena($_POST["idmarcas"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':

        if (empty($idproductos)) {
            $rspta = $productos->insertar($nombre, $resumen, $descripcion, $seo, $plista, $pventa, $idcategoria);
            echo $rspta ? "Producto registrado" : "Producto no se pudo registrar";
        } else {
            $rspta = $categoria->editar($idproductos, $nombre, $resumen, $descripcion, $seo, $plista, $pventa, $idcategoria);

            echo $rspta ? "Producto actualizado" : "Producto no se pudo actualizar";
        }
        break;

    case 'mostrar':
        $rspta = $productos->mostrar($idproductos);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    
    case 'listar':
        $rspta = $productos->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->nombre,
                "1" => $reg->resumen,
                "2" => $reg->preciolista,
                "3" => $reg->precioventa,
                "4" => $reg->categoria,
                "5" => $reg->marca,
                "6" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idproductos . ')"><i class="fa fa-pencil">Editar</i></button>'
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
