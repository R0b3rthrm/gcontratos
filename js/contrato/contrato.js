$(document).ready(function () {

   
    var formData = {txtProcess:1};
    var sbAction = "controller/contrato_c.php";

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
           
            $("#divContractFrm").html("");
            $("#divContractFrm").append(data);
            
        }
    });
    
         
});
