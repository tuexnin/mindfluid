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
    $("#idcliente").val("");
    $("#nombre").val("");
    $("#imagenmuestra").attr("src", "");
    $("#imagenactual").val("");
    $("#imagen").val("");
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
                            url: '../controller/cliente.php?op=listar',
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
        url: "../controller/cliente.php?op=guardaryeditar",
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

function mostrar(idcliente)
{
    $.post("../controller/cliente.php?op=mostrar", {idcliente: idcliente}, function (data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idcliente").val(data.idcliente);
        $("#nombre").val(data.nombre);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src", "../files/cliente/" + data.imagen);
        $("#imagenactual").val(data.imagen);
    })
}

//Función para desactivar registros
function desactivar(idcliente)
{
    bootbox.confirm("¿Está Seguro de desactivar el cliente?", function (result) {
        if (result)
        {
            $.post("../controller/cliente.php?op=desactivar", {idcliente: idcliente}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idcliente)
{
    bootbox.confirm("¿Está Seguro de activar el cliente?", function (result) {
        if (result)
        {
            $.post("../controller/cliente.php?op=activar", {idcliente: idcliente}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();
