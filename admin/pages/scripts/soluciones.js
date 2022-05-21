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
    $('#cont').trumbowyg({
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
    
}

//Función limpiar
function limpiar()
{
    $("#idblog").val("");
    $("#titulo").val("");
    //$("#tipopublicacion").val("");
    $("#descripcion").val("");
    $("#imagenactual").val("");
    $("#portada").val("");
    $("#cont").trumbowyg('empty');
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
        $("#imagenmuestra").hide();
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
                            url: '../controller/soluciones.php?op=listar',
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
        url: "../controller/soluciones.php?op=guardaryeditar",
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

function mostrar(idblog)
{
        
    $.post("../controller/soluciones.php?op=mostrar", {idblog: idblog}, function (data, status)
    {
        data = JSON.parse(data);
        //console.log(data);
        mostrarform(true);
        $("#idblog").val(data.idblog);
        $("#tipopublicacion").val(data.tipo);
        $("#titulo").val(data.titulo);
        $("#descripcion").val(data.seo);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src", "../files/contenido/" + data.portada);
        $("#imagenactual").val(data.portada);
        $("#cont").trumbowyg('html', data.contenido);
    });

}


//Función para desactivar registros
function desactivar(idblog)
{
    bootbox.confirm("¿Está Seguro de desactivar el Contenido?", function (result) {
        if (result)
        {
            $.post("../controller/soluciones.php?op=desactivar", {idblog: idblog}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idblog)
{
    bootbox.confirm("¿Está Seguro de activar el Contenido?", function (result) {
        if (result)
        {
            $.post("../controller/soluciones.php?op=activar", {idblog: idblog}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}


init();

