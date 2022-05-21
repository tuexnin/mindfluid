<?php

require_once "../modelos/Contacto.php";
require_once "../config/email.php";

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
        $rspta = $contacto->insertar($producto, $persona, $email, $telefono, $asunto, $mensaje);
        $_enviarEmail = new Mail();
        $_enviarEmail->enviar($producto, $persona, $email, $telefono, $asunto, $mensaje);
        echo $rspta ? 'Hemos recibido su mensaje, pronto nos comunicaremos.' : 'Ups. Parece que estamos teniendo problemas internos, lo sentimos no pudimos registrar su mensaje.';
        //echo $producto . " " . $persona ." ". $email . " ". $telefono ." ". $asunto ." ". $mensaje;
        break;

    case 'listar':
        $rspta = $contacto->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idcontactenos . ')"><i class="fa fa-pencil">Ver</i></button>',
                "1" => $reg->asunto,
                "2" => $reg->persona,
                "3" => $reg->email
                
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data);
        echo json_encode($results);

        break;
        
    case 'mostrar':
        $rspta = $contacto->mostrar($idcontactenos);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
}
?>