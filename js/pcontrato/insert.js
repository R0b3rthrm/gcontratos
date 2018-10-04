$(document).ready(function () {

    var formData = {txtProcess: 1};
    var sbAction = $("#frmPContrato").attr("action");
    
    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
                
                $("#divContrat").html('');
                $("#divContrat").append(data);
                $("#cmbContrat").chosen({
                    max_selected_options: 30,
                    max_shown_results: 30
                });

        }
    });
    
});


function setContrato() {
    
    
    if( $("#cmbContrat").val()==""){
        
        $("#infoContrat").html('');
        
    }else{
    
        var formData = {txtProcess: 2, cmbContrat: $("#cmbContrat").val()};
        var sbAction = $("#frmPContrato").attr("action");

        $.ajax({
            url: sbAction,
            type: 'POST',
            data: formData,
            success: function (data) {

                if (data) {

                    $("#infoContrat").html('');
                    $("#infoContrat").append(data);


                } else {
                    msjModal("Error al Mostrar Informacion del Contrato","ER");
                }
                
                $("#btnInsertPContrat").click(function(){

                    $.ajax({
                        url: sbAction,
                        type: 'POST',
                        data: {txtProcess: 3, cmbContrat: $("#cmbContrat").val()},
                        success: function (data) {

                            if (data) {
                                
                                msjModal("Verificar los Datos Antes de Finalizar el Registro del Contrato","AT");
                                $("#divContenidoContrat").html('');
                                $("#divContenidoContrat").append(data);

                            } else {
                                msjModal("Error al Finalizar el Registro","ER");
                            }

                            
                        }
                    });
                    
                });
            }
        });
    }
}
