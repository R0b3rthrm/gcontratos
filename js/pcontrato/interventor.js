$(document).ready(function () {

    isNumber(['#txtPorcentajInterv']);
    alfNum(['txtNumContrato']);
    maxChar(['#txtPorcentajInterv'], 3);
    noCopyPaste(['#txtPorcentajInterv','#txtNumContrato']);
    $("#cmbTercero").chosen({
                    max_selected_options: 30,
                    max_shown_results: 30,
                    width: "350px"
                });
    
    $("#btnIngresarInterv").click(function () {

        var nuTercero = $("#cmbTercero").val();
        var nuTInterv = $("#cmbTInterv").val();
        var nuPlanta = $("#cmbPlanta").val();
        var sbNumContrat = $("#txtNumContrato").val();
        var nuPorcentajeInterv = $("#txtPorcentajInterv").val();
        
        var arrayInfo = {0: nuTercero + "|#cmbTercero",
            1: nuTInterv + "|#cmbTInterv",
            2: nuPlanta + "|#cmbPlanta",
            3: sbNumContrat + "|#txtNumContrato",
            4: nuPorcentajeInterv + "|#txtPorcentajInterv"
        }

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            if ($('#txtPorcentajInterv').val() > 100) {
                msjModal('El Porcentaje Debe Ser Menor o Igual a 100','AT');
            } else {
                insertInterv();
            }
        }
    });

});


function insertInterv() {

    var formData = $("#frmInterv").serialize();
    var sbAction = $("#frmInterv").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
           
                alert(data);
            if (data) {
                
                msjModal('Se Registro Correctamente El Interventor','OK');
                $("#btnIngresarInterv").attr("value", "REGISTRAR")
                $("#frmInterv")[0].reset();
                $("#txtIdInterv").val('');
                $("#tableInterv").html('');
                $("#tableInterv").append(data);

            } else {
                msjModal("Error Al Registrar El Interventor","ER");
            }
        }
    });
}

function updateInterv(id) {

    var formData = {txtProcess: 62, txtIdInterv: id}
    var sbAction = $("#frmInterv").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            var result = JSON.parse(data);
            $("#txtIdInterv").val(id);
            $("#cmbTercero").val(result['tercero_id']);
            $("#cmbTInterv").val(result['t_intervt_id']);
            $("#cmbPlanta").val(result['planta']);
            $("#txtNumContrato").val(result['num_contrat']);
            $("#txtPorcentajInterv").val(result['porcentaje']);
       
        }
    });

}

function deleteInterv (id,contrato){
    
    
    $.confirm({
        title: '¡CONFIRMACION!',
        content: 'Desea Eliminar el Interventor?',
        type:   'orange',  
        buttons: {
            SI: function () {
            
                var formData = {txtProcess: 63, txtIdInterv: id, txtContrato: contrato}
                var sbAction = $("#frmInterv").attr("action");
                        
                $.ajax({
                    url: sbAction,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        
                        alert(data);
                        
                        if(data){
                             msjModal('Se Elminino Correctamente el Interventor','OK');
                             $("#tableInterv").html('');
                             $("#tableInterv").append(data);
                             
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