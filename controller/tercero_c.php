<?php

require_once("../model/tercero_m.php");
require_once("../model/tDocument_m.php");
require_once("../model/tContratist_m.php");
require_once("../model/tClasific_m.php");
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
                        
        }else if ($nuProcess == 2) {
                
                 $resultInfo = setIntegrates();
                    
        }else if ($nuProcess == 3) {
            
            $objTercero = new tercero();
            
            $objTercero->setNuTDocument(trim($_POST['cmbTDocument']));
            $objTercero->setSbIdTer(trim($_POST['txtIdFinal']));
            $objTercero->setSbNombre(trim($_POST['txtNombre']));
            $objTercero->setSbApellido1(trim($_POST['txtApellido1']));
            $objTercero->setSbApellido2(trim($_POST['txtApellido2']));
            $objTercero->setSbTel(trim($_POST['txtTel']));
            $objTercero->setSbCel(trim($_POST['txtCel']));
            $objTercero->setSbCel(trim($_POST['txtCel']));
            $objTercero->setSbEmail(trim($_POST['txtEmail']));
            $objTercero->setNuTContratist(trim($_POST['cmbTContratista']));
            $objTercero->setNuTClasific(trim($_POST['cmbTClasific']));
            $objTercero->setNuCantTerc(trim($_POST['txtCanInteg']));
            
            if(isset($_POST['cmbInteg1'])){$integ1=$_POST['cmbInteg1'];}else{$integ1=-1;}
            if(isset($_POST['cmbInteg2'])){$integ2=$_POST['cmbInteg2'];}else{$integ2=-1;}
            if(isset($_POST['cmbInteg3'])){$integ3=$_POST['cmbInteg3'];}else{$integ3=-1;}
            if(isset($_POST['cmbInteg4'])){$integ4=$_POST['cmbInteg4'];}else{$integ4=-1;}
            if(isset($_POST['cmbInteg5'])){$integ5=$_POST['cmbInteg5'];}else{$integ5=-1;}
            if(isset($_POST['cmbInteg6'])){$integ6=$_POST['cmbInteg6'];}else{$integ6=-1;}
            if(isset($_POST['cmbInteg7'])){$integ7=$_POST['cmbInteg7'];}else{$integ7=-1;}
            if(isset($_POST['cmbInteg8'])){$integ8=$_POST['cmbInteg8'];}else{$integ8=-1;}
            if(isset($_POST['cmbInteg9'])){$integ9=$_POST['cmbInteg9'];}else{$integ9=-1;}
            if(isset($_POST['cmbInteg10'])){$integ10=$_POST['cmbInteg10'];}else{$integ10=-1;}
            
            $objTercero->setSbInteg1(trim($integ1));
            $objTercero->setSbInteg2(trim($integ2));
            $objTercero->setSbInteg3(trim($integ3));
            $objTercero->setSbInteg4(trim($integ4));
            $objTercero->setSbInteg5(trim($integ5));
            $objTercero->setSbInteg6(trim($integ6));
            $objTercero->setSbInteg7(trim($integ7));
            $objTercero->setSbInteg8(trim($integ8));
            $objTercero->setSbInteg9(trim($integ9));
            $objTercero->setSbInteg10(trim($integ10));
            
            $objTercero->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo= $objTercero->saveContratista();
            
          
        }else if ($nuProcess == 20) {
                
                $resultInfo = htmlAseguradora();
                
        }else if ($nuProcess == 30) {

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
    $objTContratist = new tContratist();
    $objClasific = new tClasific();
    $cmbTipoDocument = comboBox($objTDocument, 't.id,t.nombre','','', 'cmbTDocument');
    $cmbTContratist = comboBox($objTContratist, 't.id,t.nombre','','', 'cmbTContratista');
    $cmbClasific = comboBox($objClasific, 't.id,t.nombre','','', 'cmbTClasific');

    $html = "  
        <center>
    <BR>
    <script src='js/tercero/contratista.js'></script>
    <h2>CONTRATISTA</h2>
    <form action='controller/tercero_c.php' method='post'  id='frmContratista' name = 'frmContratista'>


    <input id='txtProcess' name='txtProcess' value='3' hidden>

    <label id='error'>
    </label>

    <div class='col-8'>         

        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >TIPO DOCUMENTO:</span>
            <div class='6u$ 12u$(xsmall)' name='divTDoc'  id='divTDoc'>".$cmbTipoDocument."</div>
            <span class='input-group-addon' >NUMERO DOCUMENTO  :</span>
            <input name='txtId' id='txtId' type='text'  />
            <input name='txtDV' id='txtDV' type='text' placeholder='D. Verificacion'/>
            <input name='txtIdFinal' id='txtIdFinal' type='text' hidden/>
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

            <span class='input-group-addon' >CELULAR :</span>
            <input name='txtCel' id='txtCel' type='text' class='form-control' placeholder=' - Celular -'/>
            <span class='input-group-addon' >EMAIL :</span>
            <input name='txtEmail' id='txtEmail' type='text' class='form-control' placeholder=' - Email -'/>
        </div> 
        
        <br/>
        
       <div class='input-group input-group-sm'>
            <span class='input-group-addon' >TIPO CONTRATISTA:</span>
            <div class='6u$ 12u$(xsmall)' name='divTContratist'  id='divTContratist'>".$cmbTContratist."</div>
            <span class='input-group-addon' >CLASIFICACION CONTRATISTA:</span>
             <div class='6u$ 12u$(xsmall)' name='divClasific'  id='divClasific'>".$cmbClasific."</div>
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
                <span class='input-group-addon' >NUMERO INTEGRANTES:</span>
                <input type='text' name='txtCanInteg' id='txtCanInteg' class='form-control' placeholder=' '/>
                        
        </div>
        
        <div   id='divInteg'>
        </div>
        <br/>
        <div class='input-group input-group-sm'>
               <span class='input-group-addon' >ESTADO:</span>
                <div class='6u$ 12u$(xsmall)' name='divEstado'  id='divEstado'>
                    <SELECT id='cmbEstado' name='cmbEstado'>
                        <option value=''>-Seleccionar-</option>
                        <option value='1'>Activo</option>
                        <option value='0'>Inactivo</option>
                    </SELECT>
                
                </div>
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

function setIntegrates() {
    
    $objTercero = new tercero();
    
    $nuInteg = $_POST['txtNuInteg'];
    $html = "";
    
    for($i=1; $i<=$nuInteg; $i++){
        
      $cmbInt = comboBox($objTercero, 't.id,t.id_ter,t.nombre','t_tercero = 1','', 'cmbInteg'.$i);
     
       $html.=" 
        <br/>
        
        <div class='input-group input-group-sm'>

            <span class='input-group-addon' >Contratista ".$i.":</span>
            <div name='divInt.$i.'  id='divInt.$i.'>".$cmbInt."</div>
                
        </div>
        ";
    }
    
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
