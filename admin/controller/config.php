<?php

require_once "../modelos/Config.php";

$_config = new Config();

$idconfiguracion = isset($_POST["idconfig"]) ? limpiarCadena($_POST["idconfig"]) : "";
$wsp = isset($_POST["whatsapp"]) ? limpiarCadena($_POST["whatsapp"]) : "";
$fb = isset($_POST["facebook"]) ? limpiarCadena($_POST["facebook"]) : "";
$telefono = isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]) : "";
$correo = isset($_POST["correo"]) ? limpiarCadena($_POST["correo"]) : "";
$linked = isset($_POST["linked"]) ? $_POST["linked"] : "";
$direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
$correo2 = isset($_POST["correo2"]) ? $_POST["correo2"] : "";
$acerca = isset($_POST["acerca"]) ? $_POST["acerca"] : "";
$archivo = isset($_POST["catalogo"]) ? $_POST["catalogo"] : "";
$mapa = isset($_POST["mapa"]) ? $_POST["mapa"] : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (!file_exists($_FILES['catalogo']['tmp_name']) || !is_uploaded_file($_FILES['catalogo']['tmp_name'])) {
            $archivo = $_POST["catalogoActual"];
        } else {
            $ext = explode(".", $_FILES["catalogo"]["name"]);
            if ($_FILES['catalogo']['type'] == "application/pdf") {
                $archivo= round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["catalogo"]["tmp_name"], "../files/catalogo/" . $archivo);
            }
        }
        if (empty($idconfiguracion)) {
            $rspta = $_config->insertar($wsp, $fb, $telefono, $correo, $linked, $direccion, $correo2, $acerca, $archivo, $mapa);
            echo $rspta ? 'Configuracion Registrada' : 'Configuracion no se puedo registrar';
        } else {
            $rspta = $_config->editar($idconfiguracion ,$wsp, $fb, $telefono, $correo, $linked, $direccion, $correo2, $acerca, $archivo, $mapa);
            echo $rspta ? 'Configuracion actualizada' : 'Configuracion no se pudo actualizar';
        }
        break;

    case 'mostrar':
        $rspta = $_config->mostrar();
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
}
?>

