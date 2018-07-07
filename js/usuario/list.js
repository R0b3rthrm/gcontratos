$(document).ready(function () {

    var formData = $("#frmUsuarioList").serialize();
    var sbAction = $("#frmUsuarioList").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                $("#resultado").html("");
                $("#resultado").append(data);
                setTableFrm(['#tableList']);
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });

});

function resetPass(id) {

    $.confirm({
        title: '¡CONFIRMACION!',
        content: 'Esta Seguro Hacer Reset Pass al Usuario '+id+'?',
        type:   'orange',  
        buttons: {
            SI: function () {
            
                 var array = {txtId: id, txtProcess: 4};
        var sbAction = $("#frmUsuarioList").attr("action");

        $.ajax({
            url: sbAction,
            type: 'POST',
            data: array,
            success: function (data) {
                if(data){
                        msjModal('Se Actualizo Correctamente El Pass','OK');
                }else{
                        msjModal('Error al Hacer Reset Pass','ER');
                    
                }
                
            }
        });
                
            },
            NO: function () {
               
            }
            
        }
    });
}
