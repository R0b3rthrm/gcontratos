<?php


if (!isset($_SESSION)){session_start();}
 
//session_start();

define('KEY_SESSION','VENUS');

function getSession($sbNombreSession){
    return $_SESSION[md5($sbNombreSession.KEY_SESSION)];
}

function setSession($sbNombreSession,$sbValorSession){
    $_SESSION[md5($sbNombreSession.KEY_SESSION)]=$sbValorSession;
}

function endSession(){
    
    $sbNombreSession = 'Login';
        unset($_SESSION[md5($sbNombreSession.KEY_SESSION)]);
        $_SESSION[md5($sbNombreSession.KEY_SESSION)]=''; 
        
    $sbNombreSession = 'ID';
        unset($_SESSION[md5($sbNombreSession.KEY_SESSION)]);
        $_SESSION[md5($sbNombreSession.KEY_SESSION)]=''; 
        
    $sbNombreSession = 'Perfil';
        unset($_SESSION[md5($sbNombreSession.KEY_SESSION)]);
        $_SESSION[md5($sbNombreSession.KEY_SESSION)]=''; 
}
?>