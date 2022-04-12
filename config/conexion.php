<?php //

require_once "global.php";

$conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

mysqli_query($conexion, 'SET NAMES "' . DB_ENCODE . '"');

//Si tenemos un posible error en la conexión lo mostramos
if (mysqli_connect_errno()) {
    printf("Falló conexión a la base de datos: %s\n", mysqli_connect_error());
    exit();
}


if (!function_exists('ejecutarConsulta')) {

    function ultimoid(){
        global $conexion;
        $ultimoid = mysqli_insert_id($conexion);
        return $ultimoid;
    }


    function ejecutarConsulta($sql) {
        global $conexion;
        $query = $conexion->query($sql) or die(mysql_error());
        return $query;
    }

    function ejecutarConsultaSimpleFila($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    function ejecutarConsulta_retornarID($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        return $conexion->insert_id;
    }

    function limpiarCadena($str) {
        global $conexion;
        $str = mysqli_real_escape_string($conexion, trim($str));
        return htmlspecialchars($str);
    }

    function ejecutarConsulta2($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        if (mysqli_num_rows($query) >= 1) {
            return $data = $query->fetch_assoc();
        } else {
            return $data = 25;
        }
    }

    function ejecutarConsulta3($sql) {
        global $conexion;
        $query = $conexion->query($sql);

        return $data = $query->fetch_row();
    }

}
?>
