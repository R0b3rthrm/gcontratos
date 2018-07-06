$(document).ready(function () {

    isNumber(['#txtPorcentajePro']);
    alfNum(['#txtCodPro','#txtCodActPro'])
    maxChar(['#txtPorcentajePro'], 3);
    setCalendarFrm(['#dtFecIniPro','#dtFecFinPro']);
   
    $("#btnIngresarPro").click(function () {

        var nuCodPro = $("#txtCodPro").val();
        var nuCodAct = $("#txtCodActPro").val();
        var dtFecIniPro = $("#dtFecIniPro").val();
        var dtFecFinPro = $("#dtFecFinPro").val();
        var nuPorcentaje = $("#txtPorcentajePro").val();

        var arrayInfo = {0: nuCodPro + "|#txtCodPro",
            1: nuCodAct + "|#txtCodActPro",
            2: dtFecIniPro + "|#dtFecIniPro",
            3: dtFecFinPro + "|#dtFecFinPro",
            4: nuPorcentaje + "|#txtPorcentajePro"
        }

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            if ($('#txtPorcentajePro').val() > 100) {
                msjModal('El Porcentaje debe se menor a 100','AT');
            } else {
                insertProyecto();
            }
        }
    });

});


function insertProyecto() {

    var formData = $("#frmProyecto").serialize();
    var sbAction = $("#frmProyecto").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
           
            if (data) {
                
                 msjModal('Se Registro Correctamente el Proyecto','OK');
                $("#btnIngresarPro").attr("value", "REGISTRAR")
                $("#frmProyecto")[0].reset();
                $("#txtIdProyecto").val('');
                $("#tableProyecto").html('');
                $("#tableProyecto").append(data);

            } else {
                msjModal("Error Al Registrar El Proyecto","ER");
            }
        }
    });
}

function updateProyecto(id) {

    var formData = {txtProcess: 32, txtIdProyecto: id}
    var sbAction = $("#frmProyecto").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            var result = JSON.parse(data);
            $("#txtIdProyecto").val(id);     
            $("#txtCodPro").val(result['cod']);
            $("#txtCodActPro").val(result['cod_act']);
            $("#dtFecIniPro").val(result['fec_ini']);
            $("#dtFecFinPro").val(result['fec_fin']);
            $("#txtPorcentajePro").val(result['porcentaje']);
            
       
        }
    });

}

function deleteProyecto (id,contrato){
    
    
    $.confirm({
        title: '¡CONFIRMACION!',
        content: 'Desea Eliminar el Proyecto?',
        type:   'orange',  
        buttons: {
            SI: function () {
            
                var formData = {txtProcess: 33, txtIdProyecto: id, txtContrato: contrato}
                var sbAction = $("#frmProyecto").attr("action");
                        
                $.ajax({
                    url: sbAction,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        
                        alert(data);
                        
                        if(data){
                             msjModal('Se Elminino Correctamente el Proyecto','OK');
                             $("#tableProyecto").html('');
                             $("#tableProyecto").append(data);
                             
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