$(document).ready(function (){
    $('#btnTipo').click(function (){
        $('#contenido').load('tipo.php');
    });
    $('#btnCategoria').click(function (){
        $('#contenido').load('categoria.php');
    });
    $('#btnMarcas').click(function () {
        $('#contenido').load('marcas.php');
    });
    $('#btnProductos').click(function (){
        $('#contenido').load('productos.php');
    });
})
