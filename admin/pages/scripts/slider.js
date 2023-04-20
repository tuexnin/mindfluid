

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
        url: "../controller/slider.php?op=guardaryeditar",
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

    $.post("../controller/slider.php?op=mostrar", function (data)
    {
        data = JSON.parse(data);
        //console.log(data);
        if (data !== null) {
            $("#titulo1").val(data.titulo1);
            $("#texto1").val(data.texto1);
            $("#imagenmuestra1").attr("src", "../files/slider/" + data.url1);
            $("#imagenactual1").val(data.url1);
            $("#titulo2").val(data.titulo2);
            $("#texto2").val(data.texto2);
            $("#imagenmuestra2").attr("src", "../files/slider/" + data.url2);
            $("#imagenactual2").val(data.url2);
            $("#titulo3").val(data.titulo3);
            $("#texto3").val(data.texto3);
            $("#imagenmuestra3").attr("src", "../files/slider/" + data.url3);
            $("#imagenactual3").val(data.url3);
        }

    });

}



init();
