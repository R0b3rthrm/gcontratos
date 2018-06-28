<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class tercero extends conexion {

    private $nuId;
    private $nuTDocument;
    private $sbIdTer;
    private $sbNombre;
    private $sbApellido1;
    private $sbApellido2;
    private $sbTel;
    private $sbCel;
    private $sbEmail;
    private $nuTContratist;
    private $nuTClasific;
    private $nuCantTerc;
    private $sbInteg1;
    private $sbInteg2;
    private $sbInteg3;
    private $sbInteg4;
    private $sbInteg5;
    private $sbInteg6;
    private $sbInteg7;
    private $sbInteg8;
    private $sbInteg9;
    private $sbInteg10;
    private $nuEstado;
    
    function getNuId() {
        return $this->nuId;
    }

    function getNuTDocument() {
        return $this->nuTDocument;
    }

    function getSbIdTer() {
        return $this->sbIdTer;
    }

    function getSbNombre() {
        return $this->sbNombre;
    }

    function getSbApellido1() {
        return $this->sbApellido1;
    }

    function getSbApellido2() {
        return $this->sbApellido2;
    }

    function getSbTel() {
        return $this->sbTel;
    }

    function getSbCel() {
        return $this->sbCel;
    }

    function getSbEmail() {
        return $this->sbEmail;
    }

    function getNuTContratist() {
        return $this->nuTContratist;
    }

    function getNuTClasific() {
        return $this->nuTClasific;
    }

    function getNuCantTerc() {
        return $this->nuCantTerc;
    }

    function getSbInteg1() {
        return $this->sbInteg1;
    }

    function getSbInteg2() {
        return $this->sbInteg2;
    }

    function getSbInteg3() {
        return $this->sbInteg3;
    }

    function getSbInteg4() {
        return $this->sbInteg4;
    }

    function getSbInteg5() {
        return $this->sbInteg5;
    }

    function getSbInteg6() {
        return $this->sbInteg6;
    }

    function getSbInteg7() {
        return $this->sbInteg7;
    }

    function getSbInteg8() {
        return $this->sbInteg8;
    }

    function getSbInteg9() {
        return $this->sbInteg9;
    }

    function getSbInteg10() {
        return $this->sbInteg10;
    }

    function getNuEstado() {
        return $this->nuEstado;
    }

    function setNuId($nuId) {
        $this->nuId = $nuId;
    }

    function setNuTDocument($nuTDocument) {
        $this->nuTDocument = $nuTDocument;
    }

    function setSbIdTer($sbIdTer) {
        $this->sbIdTer = $sbIdTer;
    }

    function setSbNombre($sbNombre) {
        $this->sbNombre = $sbNombre;
    }

    function setSbApellido1($sbApellido1) {
        $this->sbApellido1 = $sbApellido1;
    }

    function setSbApellido2($sbApellido2) {
        $this->sbApellido2 = $sbApellido2;
    }

    function setSbTel($sbTel) {
        $this->sbTel = $sbTel;
    }

    function setSbCel($sbCel) {
        $this->sbCel = $sbCel;
    }

    function setSbEmail($sbEmail) {
        $this->sbEmail = $sbEmail;
    }

    function setNuTContratist($nuTContratist) {
        $this->nuTContratist = $nuTContratist;
    }

    function setNuTClasific($nuTClasific) {
        $this->nuTClasific = $nuTClasific;
    }

    function setNuCantTerc($nuCantTerc) {
        $this->nuCantTerc = $nuCantTerc;
    }

    function setSbInteg1($sbInteg1) {
        $this->sbInteg1 = $sbInteg1;
    }

    function setSbInteg2($sbInteg2) {
        $this->sbInteg2 = $sbInteg2;
    }

    function setSbInteg3($sbInteg3) {
        $this->sbInteg3 = $sbInteg3;
    }

    function setSbInteg4($sbInteg4) {
        $this->sbInteg4 = $sbInteg4;
    }

    function setSbInteg5($sbInteg5) {
        $this->sbInteg5 = $sbInteg5;
    }

    function setSbInteg6($sbInteg6) {
        $this->sbInteg6 = $sbInteg6;
    }

    function setSbInteg7($sbInteg7) {
        $this->sbInteg7 = $sbInteg7;
    }

    function setSbInteg8($sbInteg8) {
        $this->sbInteg8 = $sbInteg8;
    }

    function setSbInteg9($sbInteg9) {
        $this->sbInteg9 = $sbInteg9;
    }

    function setSbInteg10($sbInteg10) {
        $this->sbInteg10 = $sbInteg10;
    }

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

            
    public function saveContratista() {
        
       
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "INSERT INTO tercero  VALUES(0,1,"
                . $this->getNuTDocument() . ","
                . "'" . $this->getSbIdTer() . "',"
                . "'" . $this->getSbNombre() . "',"
                . "'" . $this->getSbApellido1() . "',"
                . "'" . $this->getSbApellido2() . "',"
                . "'" . $this->getSbTel() . "',"
                . "'" . $this->getSbCel(). "',"
                . "'" . $this->getSbEmail(). "',"
                . $this->getNuTContratist() . ","
                . $this->getNuTClasific() . ","
                . $this->getNuCantTerc(). ","
                . "'" . $this->getSbInteg1(). "',"
                . "'" . $this->getSbInteg2(). "',"
                . "'" . $this->getSbInteg3(). "',"
                . "'" . $this->getSbInteg4(). "',"
                . "'" . $this->getSbInteg5(). "',"
                . "'" . $this->getSbInteg6(). "',"
                . "'" . $this->getSbInteg7(). "',"
                . "'" . $this->getSbInteg8(). "',"
                . "'" . $this->getSbInteg9(). "',"
                . "'" . $this->getSbInteg10(). "',"
                . $this->getNuEstado() . ","
                . "'$dtfecha','$dtfecha', $user)";
        
        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
        
    }
    public function saveAseguradora() {
        
       
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "INSERT INTO tercero (id, t_tercero, t_document_id, id_ter, nombre, apellido1, apellido2, tel, cel, email, estado_id, fec_reg, fec_mod, user_id)  VALUES(0,2,"
                . $this->getNuTDocument() . ","
                . "'" . $this->getSbIdTer() . "',"
                . "'" . $this->getSbNombre() . "',"
                . "'" . $this->getSbApellido1() . "',"
                . "'" . $this->getSbApellido2() . "',"
                . "'" . $this->getSbTel() . "',"
                . "'" . $this->getSbCel(). "',"
                . "'" . $this->getSbEmail(). "',"
                . $this->getNuEstado() . ","
                . "'$dtfecha','$dtfecha', $user)";
        
        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
        
    }
    
    public function saveInterventor() {
        
       
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "INSERT INTO tercero (id, t_tercero, t_document_id, id_ter, nombre, apellido1, apellido2, tel, cel, email, estado_id, fec_reg, fec_mod, user_id)  VALUES(0,3,"
                . $this->getNuTDocument() . ","
                . "'" . $this->getSbIdTer() . "',"
                . "'" . $this->getSbNombre() . "',"
                . "'" . $this->getSbApellido1() . "',"
                . "'" . $this->getSbApellido2() . "',"
                . "'" . $this->getSbTel() . "',"
                . "'" . $this->getSbCel(). "',"
                . "'" . $this->getSbEmail(). "',"
                . $this->getNuEstado() . ","
                . "'$dtfecha','$dtfecha', $user)";
        
        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
        
    }

    public function updateContratista() {

        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "UPDATE tercero  SET "
                . "t_document_id='" . $this->getSbContracto() . "',"
                . "id_ter='" . $this->getSbIdTer() . "',"
                . "nombre='" . $this->getSbNombre() . "',"
                . "apellido1='" . $this->getSbApellido1() . "',"
                . "apellido2='" . $this->getSbApellido2() . "',"
                . "tel='" . $this->getSbTel() . "',"
                . "cel='" . $this->getSbCel() . "',"
                . "email='" . $this->getSbEmail() . "',"
                . "t_clasific_id=" . $this->getNuTContratist() . ","
                . "cant_terc=" . $this->getNuCantTerc(). ","
                . "tercero1_id='" . $this->getSbInteg1() . "',"
                . "tercero2_id='" . $this->getSbInteg2() . "',"
                . "tercero3_id='" . $this->getSbInteg3() . "',"
                . "tercero4_id='" . $this->getSbInteg4() . "',"
                . "tercero5_id='" . $this->getSbInteg5() . "',"
                . "tercero6_id='" . $this->getSbInteg6() . "',"
                . "tercero7_id='" . $this->getSbInteg7() . "',"
                . "tercero8_id='" . $this->getSbInteg8() . "',"
                . "tercero9_id='" . $this->getSbInteg9() . "',"
                . "tercero10_id='" . $this->getSbInteg10() . "',"
                . "estado_id='" . $this->getNuEstado() . "',"
                . "fec_mod='" . $dtfecha . "',"
                . "user_id=" . $user
                . " where id =" . $this->getNuId();

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }
    
    public function updateAseguradora() {

        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "UPDATE tercero  SET "
                . "t_document_id='" . $this->getSbContracto() . "',"
                . "id_ter='" . $this->getSbIdTer() . "',"
                . "nombre='" . $this->getSbNombre() . "',"
                . "apellido1='" . $this->getSbApellido1() . "',"
                . "apellido2='" . $this->getSbApellido2() . "',"
                . "tel='" . $this->getSbTel() . "',"
                . "cel='" . $this->getSbCel() . "',"
                . "email='" . $this->getSbEmail() . "',"
                . "fec_mod='" . $dtfecha . "',"
                . "user_id=" . $user
                . " where id =" . $this->getNuId();

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }
    
    public function updateInterventor() {

        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "UPDATE tercero  SET "
                . "t_document_id='" . $this->getSbContracto() . "',"
                . "id_ter='" . $this->getSbIdTer() . "',"
                . "nombre='" . $this->getSbNombre() . "',"
                . "apellido1='" . $this->getSbApellido1() . "',"
                . "apellido2='" . $this->getSbApellido2() . "',"
                . "tel='" . $this->getSbTel() . "',"
                . "cel='" . $this->getSbCel() . "',"
                . "email='" . $this->getSbEmail() . "',"
                . "fec_mod='" . $dtfecha . "',"
                . "user_id=" . $user
                . " where id =" . $this->getNuId();

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function getListId() {

        $arrInfo = array();
        conexion::conectar();
        $sql = "select * from acta  where id = " . $this->getNuId();
        $result = conexion::query($sql);

        while ($row = mysqli_fetch_assoc($result)) {
            foreach ($row as $key => $value) {
                $arrInfo[$key] = $value;
            }
        }
        mysqli_free_result($result);
        conexion::desconectar();
        return $arrInfo;
    }

    public function getList($select,  $where = '', $order = '', $tipoSelect = '') {

        $arrInfo = array();
        conexion::conectar();
        $sql = "SELECT " . $select . " FROM tercero t INNER JOIN t_document td ON t.t_document_id = td.id INNER JOIN t_contratist tc ON t.t_contratist_id = tc.id  INNER JOIN t_clasific tcl ON t.t_clasific_id = tcl.id INNER JOIN estado e on t.estado_id = e.id";
       
        //SELECT td.nombre as nom_document, t.id_ter as id_ter, t.nombre as nom_ter, t.apellido1 as ape1_ter, t.apellido2 as ape2_ter, tc.nombre as t_contratist, tcl.nombre as clasific, e.nombre as est_nom, 
        
        
        
        if (!empty($where)) {
            $sql .= " WHERE " . $where;
        }
        if (!empty($order)){
            $sql .= " ORDER BY ".$order;
        }

        $result = conexion::query($sql);

        if (empty($tipoSelect)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $arrInfo[] = $row;
            }
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $arrInfo[] = $row;
            }
        }

        mysqli_free_result($result);
        conexion::desconectar();
        return $arrInfo;
    }
    
    public function delete (){
        
        conexion::conectar();
        $sql="DELETE FROM acta WHERE id = ".$this->getNuId();
        $result = conexion::query($sql);
        return $result;
    }

}

?>