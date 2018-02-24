<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class usuario extends conexion {

    private $nuId;
    private $sbNombre;
    private $sbApellido1;
    private $sbApellido2;
    private $sbTelefono;
    private $sbCelular;
    private $sbEmail;
    private $sbLogin;
    private $nuPerfil;
    private $nuEstado;

    function getNuId() {
        return $this->nuId;
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

    function getSbTelefono() {
        return $this->sbTelefono;
    }

    function getSbCelular() {
        return $this->sbCelular;
    }

    function getSbEmail() {
        return $this->sbEmail;
    }

    function getSbLogin() {
        return $this->sbLogin;
    }

    function getNuPerfil() {
        return $this->nuPerfil;
    }

    function getNuEstado() {
        return $this->nuEstado;
    }

    function setNuId($nuId) {
        $this->nuId = $nuId;
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

    function setSbTelefono($sbTelefono) {
        $this->sbTelefono = $sbTelefono;
    }

    function setSbCelular($sbCelular) {
        $this->sbCelular = $sbCelular;
    }

    function setSbEmail($sbEmail) {
        $this->sbEmail = $sbEmail;
    }

    function setSbLogin($sbLogin) {
        $this->sbLogin = $sbLogin;
    }

    function setNuPerfil($nuPerfil) {
        $this->nuPerfil = $nuPerfil;
    }

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

        public function saveUsuario(){
        
        $pass = md5("*12345678*");
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();
        $sql="";
        
        $sql="INSERT INTO usuario VALUES("
                .$this->getNuId().","
                ."'".$this->getSbNombre()."',"
                ."'".$this->getSbApellido1()."',"
                ."'".$this->getSbApellido2()."',"
                ."'".$this->getSbTelefono()."',"
                ."'".$this->getSbCelular()."',"
                ."'".$this->getSbEmail()."',"
                ."'".$this->getSbLogin()."','$pass',"
                .$this->getNuPerfil().","
                .$this->getNuEstado().","
                . "'$dtfecha','$dtfecha', $user)";
        
        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();
        
        return $sql;
        
    }

    ///  cada funcion  con sus  parametros
    public function validarLogin() {
        
        $sbValido = false;

        //Recuperación de variables
        $login = $_POST['txtLogin'];
        $clave = md5($_POST['txtPass']);

        $sql = "select id, perfil_id from usuario where login ='$login' and password ='$clave' ";

        conexion::conectar();
        $result = conexion::query($sql);

        //obtiene respuesta
        $row = mysqli_fetch_array($result);

        if ($row[0] == '') {

           
        } else {
            $sessionName = $login;
            $sessionType = "Login";
            setSession($sessionType, $sessionName);

            //guarda el id en una variable de sesion
            $sessionName = $row[0];
            $sessionType = "ID";
            setSession($sessionType, $sessionName);

            //guarda el id en una variable de sesion
            $sessionName = $row[1];
            $sessionType = "Perfil";
            setSession($sessionType, $sessionName);
            $sbValido = true;
        }

        conexion::desconectar();


        return $sbValido;
    }

}

?>