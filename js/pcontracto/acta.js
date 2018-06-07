$(document).ready(function () {

    alert("entreeeeeee actas");
    isNumber(['#txtPorcentajActa']);
    maxChar(['#txtPorcentajActa'], 3);
    $('#dtFechaActa').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    
     $("#tableListActa").DataTable({"language": {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrada de _MAX_ registros)",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",

     }});
    
    $("#btnIngresarActa").click(function () {

        var nuTAvance = $("#cmbTAvance").val();
        var dtFecha = $("#dtFechaActa").val();
        var nuPorcentaje = $("#txtPorcentajActa").val();

        var arrayInfo = {0: nuTAvance + "|#cmbTAvance",
            1: dtFecha + "|#dtFechaActa",
            2: nuPorcentaje + "|#txtPorcentajActa"
        }

        var blValido = isEmptyFields(arrayInfo);
      
        //Validar Campos Vacios
        if (blValido)
        {
            if ($('#txtPorcentajActa').val() > 100) {
                alert("ERROR, El Porcentaje debe se menor a 100");
            } else {
                insertActa();
            }
        }
    });

});


function insertActa(){
        
    var formData = $("#frmActa").serialize(); 
    var sbAction = $("#frmActa").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
                 alert(data);
            if (data) {
                //$("#frmActa").reset();
                $("#tableActa").html('');
                $("#tableActa").append(data);

            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}
/*
 function setContracto(){
 
 var formData = {txtProcess:1, cmbContract:$("#cmbContract").val()};
 var sbAction = $("#frmPContracto").attr("action");
 
 $.ajax({
 url: sbAction,
 type: 'POST',
 data: formData,
 success: function (data) {
 if (data) {
 alert(data);
 $("#infoContract").html('');
 $("#infoContract").append(data);
 
 } else {
 alert("ERROR AL REGISTRAR ");
 }
 }
 });
 
 }
 
 function insert() {
 
 var formData = $("#frmContracto").serialize();
 var sbAction = $("#frmContracto").attr("action");
 
 $.ajax({
 url: sbAction,
 type: 'POST',
 data: formData,
 success: function (data) {
 if (data) {
 alert("SE REGISTRO CORRECTAMENTE");
 location.href = "contracto";
 } else {
 alert("ERROR AL REGISTRAR ");
 }
 }
 });
 }
 */