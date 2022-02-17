<?php

// recibir los datos de la imagen

$datos_imagen = $_FILES['image'];

//direcctorio donde se va guardar la imagen
$directorio = '../files/editor/';

//generar una clave para el nombre de un archivo
$llave = substr(md5(rand()), 0,16);
$extencion = pathinfo($datos_imagen['name'], PATHINFO_EXTENSION);
$nombre_archivo = $llave . "." . $extencion;
//carga de imagenes al servidor
//move_uploaded_file($datos_imagen['tmp_name'], $directorio . $datos_imagen['name']);
move_uploaded_file($datos_imagen['tmp_name'], $directorio . $nombre_archivo);


$retorno['success'] = true;
//$retorno['file'] = "https://media.gettyimages.com/photos/lottery-picture-id95442265?s=2048x2048";
//$retorno['file'] = "http://localhost/pruebaEditor/imagenes/". $datos_imagen['name'];
$retorno['file'] = "http://localhost/mindfluid/admin/files/editor/". $nombre_archivo;

echo json_encode($retorno);
?>

