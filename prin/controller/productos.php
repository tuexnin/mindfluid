<?php

require '../config/conexion.php';

$cont = 0;
$query = "select t.idtipo, ucase(t.nombre) as nombre  from tipo t";

$tipo = ejecutarConsulta($query);

$query = "select * from marcas where estado = 1";

$marcas = ejecutarConsulta($query);

$cat = isset($_GET['cat']) ? $_GET['cat'] : "";
$marca = isset($_GET['marca']) ? $_GET['marca'] : "";
$producto = isset($_GET['id']) ? $_GET['id'] : "";
$mx = '';

if (empty($cat) && empty($marca)) {
    $consultaProductos = "select * from producto";
    $respuestaProducto = ejecutarConsulta($consultaProductos);
    $marcador = 'show';
} else if (!empty($cat)) {
    $consultaProductos = "select * from producto p where p.idcategoria =" . $cat;
    $respuestaProducto = ejecutarConsulta($consultaProductos);
    $marcador = '';
    $auxiliar = "select t.idtipo ,t.nombre from categoria c 
inner join tipo t 
on t.idtipo = c.idtipo 
where c.idcategoria =" . $cat;
    $resultado = ejecutarConsultaSimpleFila($auxiliar);
    $mx = $resultado['idtipo'];
} else if (!empty($marca)) {
    $consultaProductos = "select * from producto p where p.idmarcas =" . $marca;
    $respuestaProducto = ejecutarConsulta($consultaProductos);
}

if (!empty($producto)) {
    $sql1 = "select * from productoimagen p where p.idproducto =" . $producto;

    $traerImagenes = ejecutarConsulta($sql1);
    $arregloImagen = array();
    $j = 0;
    if (mysqli_num_rows($traerImagenes)>0) {
        while ($img = mysqli_fetch_assoc($traerImagenes)) {
            $arregloImagen[$j] = $img['url'];
            $j++;
        }  
    }
    
    $sql = "select p.idproducto, p.nombre, p.descripcion, p.descripcionseo, p.preciolista, p.precioventa, c.nombre as categoria, m.nombre as marca
from producto p 
inner join categoria c 
on c.idcategoria = p.idcategoria 
inner join marcas m 
on m.idmarcas = p.idmarcas 
where p.idproducto =" . $producto;

    $traerProducto = ejecutarConsulta($sql);
}
?>