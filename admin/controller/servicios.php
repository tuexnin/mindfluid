<?php

require_once "../modelos/Servicios.php";

$blog = new Servicios();

$idblog = isset($_POST["idblog"]) ? limpiarCadena($_POST["idblog"]) : "";
$tipo = isset($_POST["tipopublicacion"]) ? limpiarCadena($_POST["tipopublicacion"]) : "";
$imagen = isset($_POST["portada"]) ? limpiarCadena($_POST["portada"]) : "";
$titulo = isset($_POST["titulo"]) ? limpiarCadena($_POST["titulo"]) : "";
$seo = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$contenido = isset($_POST["cont"]) ? $_POST["cont"] : "";
$estado = isset($_POST["estado"]) ? $_POST["estado"] : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (!file_exists($_FILES['portada']['tmp_name']) || !is_uploaded_file($_FILES['portada']['tmp_name'])) {
            $imagen = $_POST["imagenactual"];
        } else {
            $ext = explode(".", $_FILES["portada"]["name"]);
            if ($_FILES['portada']['type'] == "image/jpg" || $_FILES['portada']['type'] == "image/jpeg" || $_FILES['portada']['type'] == "image/png") {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["portada"]["tmp_name"], "../files/contenido/" . $imagen);
            }
        }
        if (empty($idblog)) {
            $rspta = $blog->insertar($tipo, $imagen, $titulo, $seo, $contenido);
            echo $rspta ? 'Publicacion Registrada' : 'Publicacion no se puedo registrar';
        } else {
            $rspta = $blog->editar($idblog, $tipo, $imagen, $titulo, $seo, $contenido);
            echo $rspta ? 'Publicacion actualizada' : 'Publicacion no se pudo actualizar';
        }
        break;

    case 'desactivar':
        $rspta = $blog->desactivar($idblog);
        echo $rspta ? "Contenido Desactivado" : "Contenido no se puede desactivar";
        break;

    case 'activar':
        $rspta = $blog->activar($idblog);
        echo $rspta ? "Contenido activado" : "Contenido no se puede activar";
        break;

    case 'mostrar':
        $rspta = $blog->mostrar($idblog);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $blog->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idblog . ')"><i class="fa fa-pencil">Editar</i></button>',
                "1" => $reg->idblog,
                "2" => $reg->titulo,
                "3" => $reg->fecpublicacion,
                "4" => $reg->estado == '0' ? '<a href="#" onclick="desactivar('. $reg->idblog .')" class="badge badge-success">Activo</a>' : '<a href="#" onclick="activar('. $reg->idblog .')" class="badge badge-danger">Inactivo</a>'
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

