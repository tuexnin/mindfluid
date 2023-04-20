var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrar();
    $("#formulario").on("submit", function (e)
    {
        guardaryeditar(e);
    })
}



function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../controller/config.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos)
        {
            bootbox.alert(datos);
            mostrar();
        }

    });

}

function mostrar()
{

    $.post("../controller/config.php?op=mostrar", function (data)
    {
        data = JSON.parse(data);
        //console.log(data);
        if(data !== null){
        $("#idconfig").val(data.idconfiguracion);
        $("#whatsapp").val(data.wsp);
        $("#facebook").val(data.fb);
        $("#telefono").val(data.telefono);
        $("#correo").val(data.correo);
        $("#linked").val(data.linken);
        $("#direccion").val(data.direccion);
        $("#correo2").val(data.correorespuesta);
        $("#acerca").val(data.acerca);
        $("#catalogoActual").val(data.catalogo);
        $("#mapa").val(data.mapa);
        }
        
    });

}



init();
