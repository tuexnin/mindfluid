var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e)
    {
        guardaryeditar(e);
    })

    //Cargamos los items al select categoria
    $("#imagenmuestra").hide();
}

//Función limpiar
function limpiar()
{
    $("#idmarca").val("");
    $("#nombre").val("");
    $("#imagenmuestra").attr("src", "");
    $("#imagenactual").val("");
    $("#imagen").val("");
    $("#estado").val("Seleccione");

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
        $("#imagenmuestra").hide();
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
                            url: '../controller/marcas.php?op=listar',
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
        url: "../controller/marcas.php?op=guardaryeditar",
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

function mostrar(idmarcas)
{
    $.post("../controller/marcas.php?op=mostrar", {idmarca: idmarcas}, function (data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idmarca").val(data.idmarcas);
        $("#nombre").val(data.nombre);
        $('#estado').val(data.estado)
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src", "../files/marcas/" + data.imagen);
        $("#imagenactual").val(data.imagen);
    })
}

//Función para desactivar registros
function desactivar(idmarcas)
{
    bootbox.confirm("¿Está Seguro de desactivar la marca?", function (result) {
        if (result)
        {
            $.post("../controller/marcas.php?op=desactivar", {idmarca: idmarcas}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idmarcas)
{
    bootbox.confirm("¿Está Seguro de activar la marca?", function (result) {
        if (result)
        {
            $.post("../controller/marcas.php?op=activar", {idmarca: idmarcas}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();
