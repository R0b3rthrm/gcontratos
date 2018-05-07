<?php

require_once("../model/utils_m.php");
$nuProceso = $_POST['proceso'];

//crio obejto de la clase Utils_m
$objUtils_m = new utils_m();

$sbHtml = "";

if ($nuProceso == 1) {

    $sbHtml = comboBox($objUtils_m);
} elseif ($nuProceso == 2) {

    $sbHmtl = "";
}

echo $sbHtml;

//////////Proceso 1 ==> Equivale al comboBox Sencillo ///////////////////
function comboBox($objUtils_m) {

    $sbHtml = "";
    //Recuperaci�n de variables
    $sql = $_POST['sql'];
    $id = $_POST['id'];
    $valor = $_POST['valor'];

    //consulta BD
    $arrInfo = $objUtils_m->getComboBox($sql);

    //obtiene respuesta
    $sbHtml = "<select name='$id' id='$id'>
				<option value=''>- Seleccionar -</option>";


    foreach ($arrInfo as $row) {

        $sbHtml .= "<option ";

        if ($row[0] == $valor) {
            $sbHtml .= "selected";
        }

        $sbHtml .= " value=$row[0]>";
        $sbHtml .= $row[1];
        if (isset($row[2])) {
            $sbHtml .= " - " . $row[2];
        }
        if (isset($row[3])) {
            $sbHtml .= " - " . $row[3];
        }
        if (isset($row[4])) {
            $sbHtml .= " - " . $row[4];
        }
        if (isset($row[5])) {
            $sbHtml .= " - " . $row[5];
        }
        if (isset($row[6])) {
            $sbHtml .= " - " . $row[6];
        }
        $sbHtml .= "</option>";
    }

    $sbHtml .= '</select>';

    return $sbHtml;
}



?>