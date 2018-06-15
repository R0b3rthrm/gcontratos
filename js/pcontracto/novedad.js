$(document).ready(function () {

   
    isNumber(['#txtValor','#txtPlazo']);
    maxChar(['#txtPlazo'], 4);
    $('#dtFecha').datepicker({format: 'yyyy-mm-dd', autoclose: true});

    $("#tableListNovedad").DataTable({"language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrada de _MAX_ registros)",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron registros coincidentes",

        }});

    $("#btnIngresar").click(function () {

        var nuTNovedad = $("#cmbTNovedad").val();
        var nuValor = $("#txtValor").val();
        var nuPlazo = $("#txtPlazo").val();
        var dtFecha = $("#dtFecha").val();
        var arrayInfo = {0: nuTNovedad + "|#cmbTNovedad",
            1: nuValor + "|#txtValor",
            2: nuPlazo + "|#txtPlazo",
            3: dtFecha + "|#dtFecha"
        }

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            insertNovedad();            
        }
    });

});


function insertNovedad() {

    var formData = $("#frmNovedad").serialize();
    var sbAction = $("#frmNovedad").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
           
            if (data) {
                $("#btnIngresar").attr("value", "REGISTRAR")
                //$("txtProcess").val('71');   
                $("#frmNovedad")[0].reset();
                $("#txtId").val('');
                $("#tableNovedad").html('');
                $("#tableNovedad").append(data);

            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}

function updateNovedad(id) {

    var formData = {txtProcess: 82, txtId: id}
    var sbAction = $("#frmNovedad").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            var result = JSON.parse(data);
            $("#txtId").val(id);
            $("#cmbTNovedad").val(result['t_novedad_id']);
            $("#txtValor").val(result['valor']);
            $("#txtPlazo").val(result['plazo']);
            $("#dtFecha").val(result['fecha']);
        }
    });

}

function deleteActa (id,contracto){    
    $.confirm({
        title: '¡CONFIRMACION!',
        content: 'Desea Eliminar la Novedad?',
        type:   'orange',  
        buttons: {
            SI: function () {
            
                var formData = {txtProcess: 83, txtId: id, txtContracto: contracto}
                var sbAction = $("#frmNovedad").attr("action");
                        
                $.ajax({
                    url: sbAction,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        
                        alert(data);
                        
                        if(data){
                             msjModal('Se Elminino Correctamente la Novedad','OK');
                             $("#tableActa").html('');
                             $("#tableActa").append(data);
                             
                        }else{
                             msjModal('No se pudo Eliminar','ER');
                        }
                        

                    }
                });
                
            },
            NO: function () {
               
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