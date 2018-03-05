$(document).ready(function () {

    var formData = $("#frmMSelecc").serialize();
    var sbAction = $("#frmMSelecc").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
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