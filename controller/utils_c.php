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

///////////FIN PROCESO 1//////////////////////

function daleteSymbol($string) {

    $string = trim($string);

    $string = preg_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), 
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
    );

    $string = preg_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), 
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
    );

    $string = preg_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), 
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
    );

    $string = preg_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
    );

    $string = preg_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), 
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
    );

    $string = preg_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'), 
            array('n', 'N', 'c', 'C',), $string
    );

    $string = preg_replace(
            array("\\", "¨", "º", "-", "~",
        "#", "@", "|", "!", "\"",
        "·", "$", "%", "&", "/",
        "(", ")", "?", "'", "¡",
        "¿", "[", "^", "<code>", "]",
        "+", "}", "{", "¨", "´",
        ">", "< ", " "), ' ', $string
    );
    return $string;
}

?>