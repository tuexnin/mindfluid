<?php

require_once "../../admin/modelos/Contacto.php";

$contacto = new Contacto();

$idcontactenos = isset($_POST["idcontacto"]) ? limpiarCadena($_POST["idcontacto"]) : "";
$producto = isset($_POST["txtProducto"]) ? limpiarCadena($_POST["txtProducto"]) : "";
$persona = isset($_POST["txtNombreCli"]) ? limpiarCadena($_POST["txtNombreCli"]) : "";
$email = isset($_POST["txtCorreoCli"]) ? limpiarCadena($_POST["txtCorreoCli"]) : "";
$telefono = isset($_POST["txtTelefonoCli"]) ? limpiarCadena($_POST["txtTelefonoCli"]) : "";
$asunto = isset($_POST["txtAsuntoCli"]) ? $_POST["txtAsuntoCli"] : "";
$mensaje = isset($_POST["txtContenidoMsgCli"]) ? $_POST["txtContenidoMsgCli"] : "";

switch ($_GET["op"]) {
    case 'enviar':
        $rspta = $contacto->insertar($producto, $persona, $email, $asunto, $mensaje);
        echo $rspta ? 'Hemos resivido su mensaje, pronto nos comunicaremos.' : 'Ups. Parece que estamos teniendo problemas internos, lo sentimos no pudimos registrar su mensaje.';
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
                "4" => $reg->estado == '0' ? '<a href="#" onclick="desactivar(' . $reg->idblog . ')" class="badge badge-success">Activo</a>' : '<a href="#" onclick="activar(' . $reg->idblog . ')" class="badge badge-danger">Inactivo</a>'
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


