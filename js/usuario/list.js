$(document).ready(function () {
    
    var formData = $("#frmUsuarioList").serialize();
    var sbAction = $("#frmUsuarioList").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                alert(data);
                alert("SE GENERANDO EL LISTADO");
                $("#resultado").html("");
                $("#resultado").append(data);
                $("#tableList").DataTable({"language": {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrada de _MAX_ registros)",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",

                    }});
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
});

function setList(evento) {

    $.post("../../src/combo/list.php", $("#frmCombo").serialize(), function (data) {

        $("#resultado").html("");
        $("#resultado").append(data);

    }, "json");
}

