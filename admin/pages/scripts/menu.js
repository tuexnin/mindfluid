$(document).ready(function (){
    $('#btnCategoria').click(function (){
        $('#contenido').load('categoria.php');
    });
    $('#btnMarcas').click(function () {
        $('#contenido').load('marcas.php');
    });
    $('#btnProductos').click(function (){
        $('#contenido').load('productos');
    });
})
