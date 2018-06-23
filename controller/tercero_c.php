<?php

require_once("../model/tercero_m.php");
require_once("../model/tDocument_m.php");
require_once("../utils/utils.php");



if (isset($_POST['txtIdC'])) {
    $resultInfo = array();
    $objContract->setSbId($_POST['txtIdC']);
    $resultInfo = $objContract->getListId();
    echo json_encode($resultInfo);
    exit;
    
} else {

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

                $resultInfo = htmlContratista();
                        
        } else if ($nuProcess == 20) {
                
                $resultInfo = htmlAseguradora();
                
        } else if ($nuProcess == 30) {

                $resultInfo = htmlInterventor();
     
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;

function htmlContratista() {
    
    //function comboBox($objUtils_m,$select,$id, $class = '', $valor ='', $event='', $func = '') {
    $objTDocument = new tDocument();
    $cmbTipoDocument = comboBox($objTDocument, 't.id,t.nombre', 'cmbTDocument');

    $html = "  
        <center>
    <BR>
    <script src='js/tercero/contratista.js'></script>
    <h2>CONTRATISTA</h2>
    <form action='controller/tercero_c.php' method='post'  id='frmTerceros' name = 'frmTerceros'>


    <input id='txtProcess' name='txtProcess' value='1' hidden>

    <label id='error'>
    </label>

    <div class='col-8'>         

        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >TIPO DOCUMENTO:</span>
            <div class='6u$ 12u$(xsmall)' name='divTDoc'  id='divTDoc'>".$cmbTipoDocument."</div>
            <span class='input-group-addon' >NUMERO DOCUMENTO  :</span>
            <input name='txtId' id='txtId' type='text'  />
            <input name='txtDV' id='txtDV' type='text' placeholder='D. Verificacion'/>
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
            <span id='spNom' class='input-group-addon' >NOMBRE :</span>
            <input type='text' name='txtNombre' id='txtNombre' class='form-control' placeholder=' - Nombre -'/>        
            <span class='input-group-addon' >APELLIDO 1 :</span>
            <input name='txtApellido1' id='txtApellido1' type='text' class='form-control' placeholder=' - Apellido 1 -'/>
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >APELLIDO 2 :</span>
            <input type='text' name='txtApellido2' id='txtApellido2' class='form-control' placeholder=' - Apellido 2 -'/>          
            <span class='input-group-addon' >TELEFONO :</span>
            <input name='txtTel' id='txtTel' type='text' class='form-control' placeholder=' - Telefono -'/>
        </div>
        <br/>

        <div class='input-group input-group-sm'>

            <span id='spDiv1' class='input-group-addon' >NATURALEZA:</span>
            <div class='6u$ 12u$(xsmall)' name='divNaturaleza'  id='divNaturaleza'> </div>
            <span id='spDiv2' class='input-group-addon' >CLASIFICACION:</span>
            <div class='6u$ 12u$(xsmall)' name='divClasific'  id='divClasific'> </div>
        </div>  

        <br/>

        <div class='input-group input-group-sm'>

            <span class='input-group-addon' >CELULAR :</span>
            <input name='txtCel' id='txtCel' type='text' class='form-control' placeholder=' - Celular -'/>
            <span class='input-group-addon' >EMAIL :</span>
            <input name='txtEmail' id='txtEmail' type='text' class='form-control' placeholder=' - Email -'/>
        </div>                


        <br/>

        <input type='button' id='btnIngresar' name='btnIngresar' value='REGISTRAR' class='button ' />
        <input type='reset' id='btnIngresar' name='btnIngresar' value='LIMPIAR' class='button ' />

    </div>

</form>
</center>
            ";


    return $html;
}

function htmlAseguradora() {
    
    $html = "
                <h2>ASEGURADORA</h2>
            ";


    return $html;
}

function htmlInterventor (){
    
    $html = "
                <h2>Interventor</h2>
            ";


    return $html;
}

?>
