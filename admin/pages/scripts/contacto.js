var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();
}

//Función limpiar
function limpiar()
{

}

//Función mostrar formulario
function mostrarform(flag)
{
    limpiar();
    if (flag)
    {
        $("#listadoregistros").hide();
        $("#vistacorreo").show();
    } else
    {
        $("#listadoregistros").show();
        $("#vistacorreo").hide();
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
                            url: '../controller/contacto.php?op=listar',
                            type: "get",
                            dataType: "json",
                            error: function (e) {
                                console.log(e.responseText);
                            }
                        },
                "bDestroy": true,
                "iDisplayLength": 10, //Paginación
                "order": [[0, "desc"]]//Ordenar (columna,orden)
            }).DataTable();
}

function mostrar(idcontacto)
{
        
    $.post("../controller/contacto.php?op=mostrar", {idcontacto: idcontacto}, function (data, status)
    {
        data = JSON.parse(data);
        //console.log(data);
        mostrarform(true);
        $("#idcontactenos").val(data.idcontactenos);
        $("#producto").val(data.producto);
        $("#persona").val(data.persona);
        $("#email").val(data.email);
        $("#telefono").val(data.telefono);
        $("#asunto").val(data.asunto);
        $("#mensaje").text(data.mensaje);
    });

}


init();

