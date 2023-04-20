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
    
    $('#btnBlog').click(function (){
        $('#contenido').load('blog.php');
    });
    
    $('#btnSoluciones').click(function (){
        $('#contenido').load('soluciones.php');
    });
    
    $('#btnServicios').click(function (){
        $('#contenido').load('servicios.php');
    });
    
    $('#btnCliente').click(function (){
        $('#contenido').load('cliente.php');
    });
    
    $('#btnContactenos').click(function (){
        $('#contenido').load('contacto.php');
    });
    
    $('#btnUsuarios').click(function (){
        $('#contenido').load('usuarios.php');
    });
    
    $('#btnConfiguracion').click(function (){
        $('#contenido').load('config.php');
    });
    
    $('#btnSlider').click(function (){
        $('#contenido').load('slider.php');
    });
})
