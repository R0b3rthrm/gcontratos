<?php

require_once("conexion.php");

class utils_m extends conexion {

    public function getComboBox($sql) {

        $arrInfo = array();
        conexion::conectar();
        $result = conexion::query($sql);

        while ($row = mysqli_fetch_array($result)) {
            $arrInfo[] = $row;
        }

        mysqli_free_result($result);
        conexion::desconectar();
        return $arrInfo;
    }

}

?>