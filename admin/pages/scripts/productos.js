var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e)
    {
        guardaryeditar(e);
    })

    //para el editor
    $('#descripcion').trumbowyg({
        lang: 'es',
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['insertImage'],
            ['upload'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen'],
            ['emoji'],
            ['indent', 'outdent'],
            ['noembed']
        ],
        plugins: {
            // Add imagur parameters to upload plugin for demo purposes
            upload: {
                serverPath: '../controller/cargarImages.php',
                fileFieldName: 'image',
                headers: {
                    'Authorization': 'Client-ID xxxxxxxxxxxx'
                },
                urlPropertyName: 'file'
            },
            resizimg: {
                minSize: 64,
                step: 16
            }
        },
        autogrow: true
    });

    //Cargamos los items al select categoria
    $.post("../controller/categoria.php?op=selectCategoria", function (data) {
        $("#categoria").html(data);
        //console.log(data);
        $('#categoria').selectpicker('refresh');
    });
    
    //Cargamos los items al select marca
    $.post("../controller/marcas.php?op=selectMarca", function (data) {
        $("#marca").html(data);
        //console.log(data);
        $('#marca').selectpicker('refresh');
    });
}

//Función limpiar
function limpiar()
{
    $("#idproducto").val("");
    $("#nombre").val("");
    $("#resumen").val("");
    $("#descripcion").trumbowyg('empty');
    $("#seo").val("");
    $("#plista").val("");
    $("#pventa").val("");
    $("#categoria").val('').trigger('change');
    $("#marca").val('').trigger('change');

}

//Función mostrar formulario
function mostrarform(flag)
{
    limpiar();
    if (flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else
    {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();

    }
}

//Función cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}

//Función Listar
function listar()
{
    tabla = $('#tbllistado').dataTable(
            {
                "aProcessing": true, //Activamos el procesamiento del datatables
                "aServerSide": true, //Paginación y filtrado realizados por el servidor
                dom: 'Bfrtip', //Definimos los elementos del control de tabla
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf',
                    'print',
                    'colvis'
                ],
                "ajax":
                        {
                            url: '../controller/productos.php?op=listar',
                            type: "get",
                            dataType: "json",
                            error: function (e) {
                                console.log(e.responseText);
                            }
                        },
                "bDestroy": true,
                "iDisplayLength": 5, //Paginación
                "order": [[0, "desc"]]//Ordenar (columna,orden)
            }).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../controller/productos.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos)
        {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(idproductos)
{
    $.post("../controller/productos.php?op=mostrar", {idproductos: idproductos}, function (data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idproducto").val(data.idproducto);
        $("#nombre").val(data.nombre);
        $("#resumen").val(data.resumen);
        $("#seo").val(data.descripcionseo);
        $("#descripcion").val(data.descripcion);
        $("#plista").val(data.preciolista);
        $("#pventa").val(data.precioventa);
        $("#categoria").val(data.categoria);
        $("#marca").val(data.marca);
    })
}


init();

