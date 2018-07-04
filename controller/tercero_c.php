<?php

require_once("../model/tercero_m.php");
require_once("../model/tDocument_m.php");
require_once("../model/tContratist_m.php");
require_once("../model/tClasific_m.php");
require_once("../model/estado_m.php");
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

            $setInfoUpdate = "";
            if (isset($_POST['txtUpdate'])) {
                $setInfoUpdate = $_POST['txtUpdate'];
            }
            $resultInfo = htmlContratista($setInfoUpdate);
        } else if ($nuProcess == 2) {

            $resultInfo = setIntegrates();
        } else if ($nuProcess == 3) {

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

            if (isset($_POST['cmbInteg1'])) {
                $integ1 = $_POST['cmbInteg1'];
            } else {
                $integ1 = -1;
            }
            if (isset($_POST['cmbInteg2'])) {
                $integ2 = $_POST['cmbInteg2'];
            } else {
                $integ2 = -1;
            }
            if (isset($_POST['cmbInteg3'])) {
                $integ3 = $_POST['cmbInteg3'];
            } else {
                $integ3 = -1;
            }
            if (isset($_POST['cmbInteg4'])) {
                $integ4 = $_POST['cmbInteg4'];
            } else {
                $integ4 = -1;
            }
            if (isset($_POST['cmbInteg5'])) {
                $integ5 = $_POST['cmbInteg5'];
            } else {
                $integ5 = -1;
            }
            if (isset($_POST['cmbInteg6'])) {
                $integ6 = $_POST['cmbInteg6'];
            } else {
                $integ6 = -1;
            }
            if (isset($_POST['cmbInteg7'])) {
                $integ7 = $_POST['cmbInteg7'];
            } else {
                $integ7 = -1;
            }
            if (isset($_POST['cmbInteg8'])) {
                $integ8 = $_POST['cmbInteg8'];
            } else {
                $integ8 = -1;
            }
            if (isset($_POST['cmbInteg9'])) {
                $integ9 = $_POST['cmbInteg9'];
            } else {
                $integ9 = -1;
            }
            if (isset($_POST['cmbInteg10'])) {
                $integ10 = $_POST['cmbInteg10'];
            } else {
                $integ10 = -1;
            }

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
            $resultInfo = $objTercero->saveContratista();
        } else if ($nuProcess == 4) {

            $objTercero = new tercero();

            $arrTerceros = $objTercero->getList('t.id,t.t_tercero ,td.nombre as nom_document, t.id_ter as id_ter, t.nombre as nom_ter, t.apellido1 as ape1_ter, t.apellido2 as ape2_ter, tc.nombre as t_contratist, tcl.nombre as clasific, e.nombre as est_nom');

            $resultInfo = "";
            $i = 1;
            foreach ($arrTerceros as $value) {

                $idTer = $value['t_tercero'];
                if ($value['t_tercero'] == 1) {
                    $value['t_tercero'] = 'Contratista';
                }
                if ($value['t_tercero'] == 2) {
                    $value['t_tercero'] = 'Aseguradora';
                }
                if ($value['t_tercero'] == 3) {
                    $value['t_tercero'] = 'Interventor';
                }

                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['t_tercero'] . '</td>'
                        . '<td>' . $value['nom_document'] . '</td>'
                        . '<td>' . $value['id_ter'] . '</td>'
                        . '<td>' . $value['nom_ter'] . ' ' . $value['ape1_ter'] . ' ' . $value['ape2_ter'] . '</td>'
                        . '<td>' . $value['t_contratist'] . '</td>'
                        . '<td>' . $value['clasific'] . '</td>'
                        . '<td>' . $value['est_nom'] . '</td>'
                        . '<td><a href="terceroUpdate?id=' . $value['id'] . '-' . $idTer . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        } else if ($nuProcess == 5) {
            
             $objTercero = new tercero();
            
            $objTercero->setNuId(trim($_POST['txtIdTercero']));
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

            if (isset($_POST['cmbInteg1'])) {
                $integ1 = $_POST['cmbInteg1'];
            } else {
                $integ1 = -1;
            }
            if (isset($_POST['cmbInteg2'])) {
                $integ2 = $_POST['cmbInteg2'];
            } else {
                $integ2 = -1;
            }
            if (isset($_POST['cmbInteg3'])) {
                $integ3 = $_POST['cmbInteg3'];
            } else {
                $integ3 = -1;
            }
            if (isset($_POST['cmbInteg4'])) {
                $integ4 = $_POST['cmbInteg4'];
            } else {
                $integ4 = -1;
            }
            if (isset($_POST['cmbInteg5'])) {
                $integ5 = $_POST['cmbInteg5'];
            } else {
                $integ5 = -1;
            }
            if (isset($_POST['cmbInteg6'])) {
                $integ6 = $_POST['cmbInteg6'];
            } else {
                $integ6 = -1;
            }
            if (isset($_POST['cmbInteg7'])) {
                $integ7 = $_POST['cmbInteg7'];
            } else {
                $integ7 = -1;
            }
            if (isset($_POST['cmbInteg8'])) {
                $integ8 = $_POST['cmbInteg8'];
            } else {
                $integ8 = -1;
            }
            if (isset($_POST['cmbInteg9'])) {
                $integ9 = $_POST['cmbInteg9'];
            } else {
                $integ9 = -1;
            }
            if (isset($_POST['cmbInteg10'])) {
                $integ10 = $_POST['cmbInteg10'];
            } else {
                $integ10 = -1;
            }

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
            
            $resultInfo = $objTercero->updateContratista();
        }else if ($nuProcess == 20) {

            $setInfoUpdate = "";
            if (isset($_POST['txtUpdate'])) {
                $setInfoUpdate = $_POST['txtUpdate'];
            }
            $resultInfo = htmlAseguradora($setInfoUpdate);
        } else if ($nuProcess == 21) {

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
            $objTercero->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTercero->updateContratista();
            
        } else if ($nuProcess == 22) {

            $objTercero = new tercero();

            $objTercero->setNuId(trim($_POST['txtIdTercero']));
            $objTercero->setNuTDocument(trim($_POST['cmbTDocument']));
            $objTercero->setSbIdTer(trim($_POST['txtIdFinal']));
            $objTercero->setSbNombre(trim($_POST['txtNombre']));
            $objTercero->setSbApellido1(trim($_POST['txtApellido1']));
            $objTercero->setSbApellido2(trim($_POST['txtApellido2']));
            $objTercero->setSbTel(trim($_POST['txtTel']));
            $objTercero->setSbCel(trim($_POST['txtCel']));
            $objTercero->setSbCel(trim($_POST['txtCel']));
            $objTercero->setSbEmail(trim($_POST['txtEmail']));
            $objTercero->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTercero->updateAseguradora();
        } else if ($nuProcess == 30) {

            $setInfoUpdate = "";
            if (isset($_POST['txtUpdate'])) {
                $setInfoUpdate = $_POST['txtUpdate'];
            }
            $resultInfo = htmlInterventor($setInfoUpdate);
        } else if ($nuProcess == 31) {

            $objTercero = new tercero();

            $objTercero->setNuId(trim($_POST['txtIdTercero']));
            $objTercero->setNuTDocument(trim($_POST['cmbTDocument']));
            $objTercero->setSbIdTer(trim($_POST['txtIdFinal']));
            $objTercero->setSbNombre(trim($_POST['txtNombre']));
            $objTercero->setSbApellido1(trim($_POST['txtApellido1']));
            $objTercero->setSbApellido2(trim($_POST['txtApellido2']));
            $objTercero->setSbTel(trim($_POST['txtTel']));
            $objTercero->setSbCel(trim($_POST['txtCel']));
            $objTercero->setSbCel(trim($_POST['txtCel']));
            $objTercero->setSbEmail(trim($_POST['txtEmail']));
            $objTercero->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTercero->saveAseguradora();
        } else if ($nuProcess == 32) {

            $objTercero = new tercero();

            $objTercero->setNuId(trim($_POST['txtIdTercero']));
            $objTercero->setNuTDocument(trim($_POST['cmbTDocument']));
            $objTercero->setSbIdTer(trim($_POST['txtIdFinal']));
            $objTercero->setSbNombre(trim($_POST['txtNombre']));
            $objTercero->setSbApellido1(trim($_POST['txtApellido1']));
            $objTercero->setSbApellido2(trim($_POST['txtApellido2']));
            $objTercero->setSbTel(trim($_POST['txtTel']));
            $objTercero->setSbCel(trim($_POST['txtCel']));
            $objTercero->setSbCel(trim($_POST['txtCel']));
            $objTercero->setSbEmail(trim($_POST['txtEmail']));
            $objTercero->setNuEstado(trim($_POST['cmbEstado']));

            $resultInfo = $objTercero->updateInterventor();
            echo $resultInfo;
            exit;
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;

function htmlContratista($setIdUpdate) {

    //function comboBox($objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = '') {
    $objTDocument = new tDocument();
    $objEstado = new estado();
    $objTContratist = new tContratist();
    $objClasific = new tClasific();

    $TDocumento = "";
    $idTer = "";
    $nom = "";
    $ape1 = "";
    $ape2 = "";
    $tel = "";
    $cel = "";
    $email = "";
    $estado = "";
    $tcontrat = "";
    $clasific = "";
    $cantTer = "";
    $Integ = "";
    $sbProcess = "<input id='txtProcess' name='txtProcess' value='3' hidden>";

    if (!empty($setIdUpdate)) {
        $objTercero = new tercero();
        $objTercero->setNuId($setIdUpdate);
        $arrInfo = $objTercero->getListId();
        $TDocumento = $arrInfo['t_document_id'];
        $idTer = $arrInfo['id_ter'];
        $nom = $arrInfo['nombre'];
        $ape1 = $arrInfo['apellido1'];
        $ape2 = $arrInfo['apellido2'];
        $tel = $arrInfo['tel'];
        $cel = $arrInfo['cel'];
        $email = $arrInfo['email'];
        $estado = $arrInfo['estado_id'];
        $clasific = $arrInfo['t_clasific_id'];
        $tcontrat = $arrInfo['t_contratist_id'];
        $cantTer = $arrInfo['cant_terc'];
        $sbProcess = "<input id='txtProcess' name='txtProcess' value='5' hidden>"
                . "<input id='txtIdTercero' name='txtIdTercero' value='$setIdUpdate' hidden>";
        $Integ = setIntegrates($arrInfo['cant_terc'],$setIdUpdate);
    };
    $cmbTipoDocument = comboBox($objTDocument, 't.id,t.nombre', '', '', 'cmbTDocument', '', $TDocumento);
    $cmbEstado = comboBox($objEstado, 'id,nombre', '', '', 'cmbEstado', '', $estado);
    $cmbTContratist = comboBox($objTContratist, 't.id,t.nombre', '', '', 'cmbTContratista', '', $tcontrat);
    $cmbClasific = comboBox($objClasific, 't.id,t.nombre', '', '', 'cmbTClasific', '', $clasific);

    $html = "  
        <center>
    <BR>
    <script src='js/tercero/contratista.js'></script>
    <h2>CONTRATISTA</h2>
    <form action='controller/tercero_c.php' method='post'  id='frmContratista' name = 'frmContratista'>

    ".$sbProcess."

    <label id='error'>
    </label>

    <div class='col-8'>         

        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >TIPO DOCUMENTO:</span>
            <div class='6u$ 12u$(xsmall)' name='divTDoc'  id='divTDoc'>" . $cmbTipoDocument . "</div>
            <span class='input-group-addon' >NUMERO DOCUMENTO  :</span>
            <input name='txtId' id='txtId' type='text' value='$idTer'  />
            <input name='txtDV' id='txtDV' type='text' placeholder='D. Verificacion'/>
            <input name='txtIdFinal' id='txtIdFinal' type='text' hidden/>
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
            <span id='spNom' class='input-group-addon' >NOMBRE :</span>
            <input type='text' name='txtNombre' id='txtNombre' class='form-control' placeholder=' - Nombre -' value='$nom'/>        
            <span class='input-group-addon' >APELLIDO 1 :</span>
            <input name='txtApellido1' id='txtApellido1' type='text' class='form-control' placeholder=' - Apellido 1 -' value='$ape1'/>
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >APELLIDO 2 :</span>
            <input type='text' name='txtApellido2' id='txtApellido2' class='form-control' placeholder=' - Apellido 2 -' value='$ape2'/>          
            <span class='input-group-addon' >TELEFONO :</span>
            <input name='txtTel' id='txtTel' type='text' class='form-control' placeholder=' - Telefono -' value='$tel'/>
        </div>
        <br/>

        <div class='input-group input-group-sm'>

            <span class='input-group-addon' >CELULAR :</span>
            <input name='txtCel' id='txtCel' type='text' class='form-control' placeholder=' - Celular -' value='$cel'/>
            <span class='input-group-addon' >EMAIL :</span>
            <input name='txtEmail' id='txtEmail' type='text' class='form-control' placeholder=' - Email -' value='$email'/>
        </div> 
        
        <br/>
        
       <div class='input-group input-group-sm'>
            <span class='input-group-addon' >TIPO CONTRATISTA:</span>
            <div class='6u$ 12u$(xsmall)' name='divTContratist'  id='divTContratist'>" . $cmbTContratist . "</div>
            <span class='input-group-addon' >CLASIFICACION CONTRATISTA:</span>
             <div class='6u$ 12u$(xsmall)' name='divClasific'  id='divClasific'>" . $cmbClasific . "</div>
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
                <span class='input-group-addon' >NUMERO INTEGRANTES:</span>
                <input type='text' name='txtCanInteg' id='txtCanInteg' class='form-control'  value='$cantTer'/>
                        
        </div>
        
        <div   id='divInteg'> ".$Integ."
        </div>
        <br/>
        <div class='input-group input-group-sm'>
               <span class='input-group-addon' >ESTADO:</span>
                <div class='6u$ 12u$(xsmall)' name='divEstado'  id='divEstado'>" . $cmbEstado . "</div>
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

function setIntegrates($nuCanIng = '', $id =''){

    $objTercero = new tercero();

    //$nuInteg = $_POST['txtNuInteg'];
    $html = "";

    if(!empty($nuCanIng)){
        
        $objTercero->setNuId($id);
        $arrInt= $objTercero->getListId();
         $nuInteg = $nuCanIng;
    }else{
        
        $nuInteg = $_POST['txtNuInteg'];
        $html = "";
    }
    
    
    for ($i = 1; $i <= $nuInteg; $i++) {
        
        $valInt="";
        if(isset($arrInt['tercero'.$i.'_id'])){$valInt=$arrInt['tercero'.$i.'_id'];}

        $cmbInt = comboBox($objTercero, 't.id,t.id_ter,t.nombre', 't_tercero = 1 AND t.estado_id = 1', '', 'cmbInteg' . $i,'',$valInt);

        $html .= " 
        <br/>
        
        <div class='input-group input-group-sm'>

            <span class='input-group-addon' >Contratista " . $i . ":</span>
            <div name='divInt.$i.'  id='divInt.$i.'>" . $cmbInt . "</div>
                
        </div>
        ";
    }

    return $html;
}

function htmlAseguradora($setIdUpdate) {
    //function comboBox($objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = '') {
    $objTDocument = new tDocument();
    $objEstado = new estado();

    $TDocumento = "";
    $idTer = "";
    $nom = "";
    $ape1 = "";
    $ape2 = "";
    $tel = "";
    $cel = "";
    $email = "";
    $estado = "";
    $sbProcess = "<input id='txtProcess' name='txtProcess' value='21' hidden>";

    if (!empty($setIdUpdate)) {
        $objTercero = new tercero();
        $objTercero->setNuId($setIdUpdate);
        $arrInfo = $objTercero->getListId();
        $TDocumento = $arrInfo['t_document_id'];
        $idTer = $arrInfo['id_ter'];
        $nom = $arrInfo['nombre'];
        $ape1 = $arrInfo['apellido1'];
        $ape2 = $arrInfo['apellido2'];
        $tel = $arrInfo['tel'];
        $cel = $arrInfo['cel'];
        $email = $arrInfo['email'];
        $estado = $arrInfo['estado_id'];
        $sbProcess = "<input id='txtProcess' name='txtProcess' value='22' hidden>"
                . "<input id='txtIdTercero' name='txtIdTercero' value='$setIdUpdate' hidden>";
    };
    $cmbTipoDocument = comboBox($objTDocument, 't.id,t.nombre', '', '', 'cmbTDocument', '', $TDocumento);
    $cmbEstado = comboBox($objEstado, 'id,nombre', '', '', 'cmbEstado', '', $estado);

    $html = "
                     <center>
    <BR>
    <script src='js/tercero/aseguradora.js'></script>
    <h2>ASEGURADORA</h2>
    <form action='controller/tercero_c.php' method='post'  id='frmAseguradora' name = 'frmAseguradora'>
 
    " . $sbProcess . "

    <label id='error'>
    </label>

    <div class='col-8'>         

        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >TIPO DOCUMENTO:</span>
            <div class='6u$ 12u$(xsmall)' name='divTDoc'  id='divTDoc'>" . $cmbTipoDocument . "</div>
            <span class='input-group-addon' >NUMERO DOCUMENTO  :</span>
            <input name='txtId' id='txtId' type='text' value='$idTer'   />
            <input name='txtDV' id='txtDV' type='text' placeholder='D. Verificacion'/>
            <input name='txtIdFinal' id='txtIdFinal' type='text' hidden/>
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
            <span id='spNom' class='input-group-addon' >NOMBRE :</span>
            <input type='text' name='txtNombre' id='txtNombre' class='form-control' placeholder=' - Nombre -' value='$nom'/>        
            <span class='input-group-addon' >APELLIDO 1 :</span>
            <input name='txtApellido1' id='txtApellido1' type='text' class='form-control' placeholder=' - Apellido 1 -' value='$ape1' />
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >APELLIDO 2 :</span>
            <input type='text' name='txtApellido2' id='txtApellido2' class='form-control' placeholder=' - Apellido 2 -' value='$ape2'/>          
            <span class='input-group-addon' >TELEFONO :</span>
            <input name='txtTel' id='txtTel' type='text' class='form-control' placeholder=' - Telefono -' value='$tel'/>
        </div>
        <br/>

        <div class='input-group input-group-sm'>

            <span class='input-group-addon' >CELULAR :</span>
            <input name='txtCel' id='txtCel' type='text' class='form-control' placeholder=' - Celular -' value='$cel'/>
            <span class='input-group-addon' >EMAIL :</span>
            <input name='txtEmail' id='txtEmail' type='text' class='form-control' placeholder=' - Email -' value='$email'/>
        </div> 
        
        <br/>
      
        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >TIPO DOCUMENTO:</span>
            <div class='6u$ 12u$(xsmall)'>" . $cmbEstado . "</div>
        </div>
         
        
        <br/>

        <input type='button' id='btnIngresar' name='btnIngresar' value='REGISTRAR' class='button ' />
        <input type='reset' id='btnIngresar' name='btnIngresar' value='LIMPIAR' class='button ' />

    </div>

</form>
            ";


    return $html;
}

function htmlInterventor($setIdUpdate) {

    //function comboBox($objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = '') {
    $objTDocument = new tDocument();
    $objEstado = new estado();

    $TDocumento = "";
    $idTer = "";
    $nom = "";
    $ape1 = "";
    $ape2 = "";
    $tel = "";
    $cel = "";
    $email = "";
    $estado = "";
    $sbProcess = "<input id='txtProcess' name='txtProcess' value='31' hidden>";

    if (!empty($setIdUpdate)) {
        $objTercero = new tercero();
        $objTercero->setNuId($setIdUpdate);
        $arrInfo = $objTercero->getListId();
        $TDocumento = $arrInfo['t_document_id'];
        $idTer = $arrInfo['id_ter'];
        $nom = $arrInfo['nombre'];
        $ape1 = $arrInfo['apellido1'];
        $ape2 = $arrInfo['apellido2'];
        $tel = $arrInfo['tel'];
        $cel = $arrInfo['cel'];
        $email = $arrInfo['email'];
        $estado = $arrInfo['estado_id'];
        $sbProcess = "<input id='txtProcess' name='txtProcess' value='32' hidden>"
                . "<input id='txtIdTercero' name='txtIdTercero' value='$setIdUpdate' hidden>";
    };
    $cmbTipoDocument = comboBox($objTDocument, 't.id,t.nombre', '', '', 'cmbTDocument', '', $TDocumento);
    $cmbEstado = comboBox($objEstado, 'id,nombre', '', '', 'cmbEstado', '', $estado);

    $html = "
                         <center>
    <BR>
    <script src='js/tercero/interventor.js'></script>
    <h2>INTERVENTOR</h2>
    <form action='controller/tercero_c.php' method='post'  id='frmInterventor' name = 'frmInterventor'>

    " . $sbProcess . "

    <label id='error'>
    </label>

    <div class='col-8'>         

        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >TIPO DOCUMENTO:</span>
            <div class='6u$ 12u$(xsmall)' name='divTDoc'  id='divTDoc'>" . $cmbTipoDocument . "</div>
            <span class='input-group-addon' >NUMERO DOCUMENTO  :</span>
            <input name='txtId' id='txtId' type='text'  value='$idTer'/>
            <input name='txtDV' id='txtDV' type='text' placeholder='D. Verificacion'/>
            <input name='txtIdFinal' id='txtIdFinal' type='text' hidden/>
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
            <span id='spNom' class='input-group-addon' >NOMBRE :</span>
            <input type='text' name='txtNombre' id='txtNombre' class='form-control' placeholder=' - Nombre -' value='$nom'/>        
            <span class='input-group-addon' >APELLIDO 1 :</span>
            <input name='txtApellido1' id='txtApellido1' type='text' class='form-control' placeholder=' - Apellido 1 -' value='$ape1'/>
        </div>                

        <br/>

        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >APELLIDO 2 :</span>
            <input type='text' name='txtApellido2' id='txtApellido2' class='form-control' placeholder=' - Apellido 2 -' value='$ape2'/>          
            <span class='input-group-addon' >TELEFONO :</span>
            <input name='txtTel' id='txtTel' type='text' class='form-control' placeholder=' - Telefono -' value='$tel'/>
        </div>
        <br/>

        <div class='input-group input-group-sm'>

            <span class='input-group-addon' >CELULAR :</span>
            <input name='txtCel' id='txtCel' type='text' class='form-control' placeholder=' - Celular -' value='$cel'/>
            <span class='input-group-addon' >EMAIL :</span>
            <input name='txtEmail' id='txtEmail' type='text' class='form-control' placeholder=' - Email -' value='$email'/>
        </div> 
        
        <br/>
      
        <div class='input-group input-group-sm'>
            <span class='input-group-addon' >TIPO DOCUMENTO:</span>
            <div class='6u$ 12u$(xsmall)'>" . $cmbEstado . "</div>
        </div>
        
        <br/>

        <input type='button' id='btnIngresar' name='btnIngresar' value='REGISTRAR' class='button ' />
        <input type='reset' id='btnIngresar' name='btnIngresar' value='LIMPIAR' class='button ' />

    </div>

</form>
            ";


    return $html;
}

?>
