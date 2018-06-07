$(document).ready(function () {

    var sqlContract = "select id,id, depend_nom from v_contracto where estado_id !=0";
    //llenar combox
    comboBox(sqlContract, "cmbContract", '', '#divContract', 'onchange','setContracto()','select-wrapper');
    
    $("#divContract").click(function(){  $("#cmbContract").chosen({
            max_selected_options:30,
            max_shown_results:30	
    });});   
    
});


function setContracto(){
    
    var formData = {txtProcess:1, cmbContract:$("#cmbContract").val()};
    var sbAction = $("#frmPContracto").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
       
            if (data) {
                
                $("#infoContract").html('');
                $("#infoContract").append(data);

            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
    
}
