<?php

require_once "../modelos/Productos.php";
require_once "../modelos/ProImagen.php";

$productos = new Productos();
$proimagen = new ProImagen();

$idproducto = isset($_POST["idproducto"]) ? limpiarCadena($_POST["idproducto"]) : "";
$idcategoria = isset($_POST["categoria"]) ? limpiarCadena($_POST["categoria"]) : "";
$resumen = isset($_POST["resumen"]) ? limpiarCadena($_POST["resumen"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
//$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
$seo = isset($_POST["seo"]) ? limpiarCadena($_POST["seo"]) : "";
$plista = isset($_POST["plista"]) ? limpiarCadena($_POST["plista"]) : "";
$pventa = isset($_POST["pventa"]) ? limpiarCadena($_POST["pventa"]) : "";
$idmarcas = isset($_POST["marca"]) ? limpiarCadena($_POST["marca"]) : "";
$idproductoimg3=isset($_POST["imagenactualid3"]) ? limpiarCadena($_POST["imagenactualid3"]) : "";
$idproductoimg2=isset($_POST["imagenactualid2"]) ? limpiarCadena($_POST["imagenactualid2"]) : "";
$idproductoimg1=isset($_POST["imagenactualid1"]) ? limpiarCadena($_POST["imagenactualid1"]) : "";


switch ($_GET["op"]) {
    case 'guardaryeditar':
        $imagenes = array();
        if (!file_exists($_FILES['imagen1']['tmp_name']) || !is_uploaded_file($_FILES['imagen1']['tmp_name'])) {
            $imagenes[0] = $_POST["imagenactual1"];
        } else {
            $ext = explode(".", $_FILES["imagen1"]["name"]);
            if ($_FILES['imagen1']['type'] == "image/jpg" || $_FILES['imagen1']['type'] == "image/jpeg" || $_FILES['imagen1']['type'] == "image/png") {
                $imagen = $ext[0].round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen1"]["tmp_name"], "../files/productos/" . $imagen);
                $imagenes[0]=$imagen;
            }
        }
        if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name'])) {
            $imagenes[1] = $_POST["imagenactual2"];
        } else {
            $ext = explode(".", $_FILES["imagen2"]["name"]);
            if ($_FILES['imagen2']['type'] == "image/jpg" || $_FILES['imagen2']['type'] == "image/jpeg" || $_FILES['imagen2']['type'] == "image/png") {
                $imagen = $ext[0].round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/productos/" . $imagen);
                $imagenes[1]=$imagen;
            }
        }
        if (!file_exists($_FILES['imagen3']['tmp_name']) || !is_uploaded_file($_FILES['imagen3']['tmp_name'])) {
            $imagenes[2] = $_POST["imagenactual3"];
        } else {
            $ext = explode(".", $_FILES["imagen3"]["name"]);
            if ($_FILES['imagen3']['type'] == "image/jpg" || $_FILES['imagen3']['type'] == "image/jpeg" || $_FILES['imagen3']['type'] == "image/png") {
                $imagen = $ext[0].round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen3"]["tmp_name"], "../files/productos/" . $imagen);
                $imagenes[2] = $imagen;
            }
        }
        if (empty($idproducto)) {
            $rspta = $productos->insertar($nombre, $resumen, $descripcion, $seo, $plista, $pventa, $idmarcas, $idcategoria, $imagenes[0]);
            $reporte = array();
            if ($rspta) {
                
                $id = $productos->ultimoid();
                for ($i = 0; $i < 3; $i++) {
                    $rspta = $proimagen->insertar($imagenes[$i], $id);
                    $reporte[$i] = $rspta ? 1 : 0;
                }
            }
            echo $reporte[0] == 1 && $reporte[1] == 1 && $reporte[2] == 1 ? 'Producto Registrado' : 'Producto no se puedo registrar';
        } else {
            $reporte = array();
            $rspta = $productos->editar($idproducto, $nombre, $resumen, $descripcion, $seo, $plista, $pventa,$idmarcas, $idcategoria, $imagenes[0]);
            $reporte[0] = $rspta ? 1 : 0;
            $arrimg=array();
            $arrimg[0]=$idproductoimg1;
            $arrimg[1]=$idproductoimg2;
            $arrimg[2]=$idproductoimg3;
            for ($i = 0; $i < 3; $i++) {
                $rspta = $proimagen->editar($arrimg[$i], $imagenes[$i], $idproducto);
                $reporte[$i + 1] = $rspta ? 1 : 0;
            }
            echo $reporte[0] == 1 && $reporte[1] == 1 && $reporte[2] == 1 && $reporte[3] == 1 ? 'Producto actualizado' : 'Producto no se pudo actualizar';
        }
        break;

    case 'mostrar1':
        $rspta = $productos->mostrar($idproducto);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    case 'mostrar2':
        $rspta = $proimagen->mostrar($idproducto);
        $data = array();
        while ($reg =$rspta->fetch_object()) {
            $data[] = array(
                "id" => $reg->idproductoimagen,
                "url" => $reg->url
            );
        }
        echo json_encode($data);
        break;

    case 'listar':
        $rspta = $productos->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idproducto . ')"><i class="fa fa-pencil">Editar</i></button>',
                "1" => $reg->nombre,
                "2" => $reg->resumen,
                "3" => $reg->categoria,
                "4" => $reg->marca,

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
