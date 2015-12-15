<?php

require_once '../negocio/Sesion.class.php';
require_once '../util/funciones/Funciones.class.php';

$objSesion = new Sesion();
$objSesion->setUsuario('gobierno');
$objSesion->setClave('123456');

if (isset($_POST["chkrecordar"])){
    $objSesion->setRecordar("S");
}else{
    $objSesion->setRecordar("N");
}

$resultado = $objSesion->iniciarSesion();
print_r($resultado);
switch ($resultado){
    case 1:       
        header("location:../vista/principal.php");
        break;
    case 2:
        Funciones::mensaje(
                "El usuario se encuentra inactivo", 
                "a",
                "../vista/index.php",
                10);
        break;
    default:
        Funciones::mensaje(
                "El usuario del usuario o la contraseña son incorrectos", 
                "e",
                "../vista/index.php",
                5);
}