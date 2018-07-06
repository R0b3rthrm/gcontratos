$(document).ready(function () {

    var sqlContract = "select id,id, depend_nom from v_contracto where estado_id !=0";
    //llenar combox
    comboBox(sqlContract, "cmbContract", '', '#divContract', 'onchange', 'setContrato()', 'select-wrapper');
       setTimeout(function(){ $("#cmbContract").chosen({
                    max_selected_options: 30,
                    max_shown_results: 30
                });},600);
    //$("#divContract").click(function(){  ;});   

});


function setContrato() {

    var formData = {txtProcess: 1, cmbContract: $("#cmbContract").val()};
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
