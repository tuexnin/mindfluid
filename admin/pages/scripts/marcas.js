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
        url: "../ajax/personal.php?op=guardaryeditar",
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

function mostrar(idpersonal)
{
    $.post("../ajax/personal.php?op=mostrar", {idpersonal: idpersonal}, function (data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idpersonal").val(data.id);
        $("#pri_nombre").val(data.pri_nombre);
        $("#sec_nombre").val(data.sec_nombre);
        $("#ap_paterno").val(data.ape_paterno);
        $("#ap_materno").val(data.ape_materno);
        $("#dni").val(data.dni);
        $("#correo").val(data.correo);
        $("#carrera").val(data.carrera);
        $("#cargo").val(data.cargo);
        $("#descripcion").val(data.descripcion);
        $('#estado').val(data.estado)
        $('#categoria').val(data.categoria);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src", "../files/muestra/" + data.foto);
        $("#imagenactual").val(data.foto);
    })
}

//Función para desactivar registros
function desactivar(idpersonal)
{
    bootbox.confirm("¿Está Seguro de desactivar al personal?", function (result) {
        if (result)
        {
            $.post("../ajax/personal.php?op=desactivar", {idpersonal: idpersonal}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idpersonal)
{
    bootbox.confirm("¿Está Seguro de activar al personal?", function (result) {
        if (result)
        {
            $.post("../ajax/personal.php?op=activar", {idpersonal: idpersonal}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();
