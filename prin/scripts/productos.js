
//Función que se ejecuta al inicio
function init() {

    $.post("../controller/tipo.php?op=selectTipo", function (data) {
        $("#tipo").html(data);
        //console.log(data);
        $('#tipo').selectpicker('refresh');
    });
}


function cargarProducto(categoria){
    $.post("../controller/productos.php", {categoria: categoria}, function (data) {
        data = JSON.parse(data);
    });
}


init();

