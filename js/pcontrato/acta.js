$(document).ready(function () {

    isNumber(['#txtPorcentajActa']);
    maxChar(['#txtPorcentajActa'], 3);
    setCalendarFrm(['#dtFecAct']);
   
    $("#btnIngresarActa").click(function () {

        var nuTAvance = $("#cmbTAvance").val();
        var dtFecha = $("#dtFecAct").val();
        var nuPorcentaje = $("#txtPorcentajActa").val();

        var arrayInfo = {0: nuTAvance + "|#cmbTAvance",
            1: dtFecha + "|#dtFecAct",
            2: nuPorcentaje + "|#txtPorcentajActa"
        }

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            if ($('#txtPorcentajActa').val() > 100) {
                msjModal('El Porcentaje debe se menor a 1000','AT');
            } else {
                insertActa();
            }
        }
    });

});


function insertActa() {

    var formData = $("#frmActa").serialize();
    var sbAction = $("#frmActa").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
           
            if (data) {
                
                 msjModal('Se Registro Correctamente el Acta','OK');
                $("#btnIngresarActa").attr("value", "REGISTRAR")
                $("#frmActa")[0].reset();
                $("#txtIdAct").val('');
                $("#tableActa").html('');
                $("#tableActa").append(data);

            } else {
                msjModal("Error Al Registrar El Acta","ER");
            }
        }
    });
}

function updateActa(id) {

    var formData = {txtProcess: 72, txtIdAct: id}
    var sbAction = $("#frmActa").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            var result = JSON.parse(data);
            $("#txtIdAct").val(id);
            $("#cmbTAvance").val(result['t_avance_id']);
            $("#dtFecAct").val(result['fecha']);
            //$(selector).attr(atributo, valor)

            $("#txtPorcentajActa").val(result['porcentaje']);
            

        }
    });

}

function deleteActa (id,contracto){
    
    
    $.confirm({
        title: '¡CONFIRMACION!',
        content: 'Desea Eliminar el Acta?',
        type:   'orange',  
        buttons: {
            SI: function () {
            
                var formData = {txtProcess: 73, txtIdAct: id, txtContracto: contracto}
                var sbAction = $("#frmActa").attr("action");
                        
                $.ajax({
                    url: sbAction,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        
                        alert(data);
                        
                        if(data){
                             msjModal('Se Elminino Correctamente el Acta','OK');
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