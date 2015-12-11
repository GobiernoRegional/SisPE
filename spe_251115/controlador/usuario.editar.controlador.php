<?php
require_once '../negocio/usuario.class.php';

//$usuario="practicante";
//$claveveAntigua="123456";
//$claveNueva="1234";
$usuario=$_POST["p_usuario"];
$claveveAntigua=$_POST["p_clave_antigua"];
$claveNueva=$_POST["p_clave_nueva"];

$objUsuario = new Usuario();

$objUsuario->setUsuario($usuario);
$objUsuario->setClave_antigua($claveveAntigua);
$objUsuario->setClave_nueva($claveNueva);


try {
    
//    $resu=$objUsuario->ModificarClaveUsuario();
//    print_r($resu);
    if ($objUsuario->ModificarClaveUsuario()==true){
            echo "Se Cambio la Contraseña Satisfactoriamente";
        }
     
} catch (Exception $ex) {
    header("HTTP/1.1 500");
    echo $ex->getMessage();
}





