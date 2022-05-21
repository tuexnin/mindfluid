
//Función que se ejecuta al inicio
function init() {
    $("#formularioContacto").on("submit", function (e)
    {
        enviar(e);
    })
}

//Función limpiar
function limpiar()
{
    $("#txtNombreCli").val("");
    $("#txtCorreoCli").val("");
    $("#txtTelefonoCli").val("");
    $("#txtAsuntoCli").val("");
    $("#txtContenidoMsgCli").val("");
}

//Función para enviar

function enviar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formularioContacto")[0]);
    $.ajax({
        url: "../admin/controller/contacto.php?op=enviar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos)
        {
            bootbox.alert(datos);
        }

    });
    limpiar();
}

init();


