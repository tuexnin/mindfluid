<?php

require_once "../modelos/Blog.php";

$blog = new Blog();

$idblog = isset($_POST["idblog"]) ? limpiarCadena($_POST["idblog"]) : "";
$titulo = isset($_POST["titulo"]) ? limpiarCadena($_POST["titulo"]) : "";
$contenido = isset($_POST["cont"]) ? $_POST["cont"] : "";


switch ($_GET["op"]) {
    case 'guardaryeditar':
        
        if (empty($idblog)) {
            $rspta = $blog->insertar($titulo, $contenido);
            echo $rspta ? 'Publicacion Registrada' : 'Publicacion no se puedo registrar';
        } else {
            $rspta = $blog->editar($idblog, $titulo, $contenido);
            echo $rspta ? 'Publicacion actualizada' : 'Publicacion no se pudo actualizar';
        }
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
                "1" => $reg->titulo,
                "2" => $reg->contenido,
                "3" => $reg->fecpublicacion
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

