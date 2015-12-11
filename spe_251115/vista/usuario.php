<?php
    session_name("sistema-spe");
    session_start();
    if( ! isset($_SESSION["usuario"])){
        header("location:index.php");        
    } 
    if ($_SESSION["pdependencia"]=="0"){        
        header("location:principal.php");
    }else{
       $nombreUsuario = ucwords(strtolower($_SESSION["usuario"]));
       $cargo = ucwords(strtolower($_SESSION["cargo"]));
       $cuenta = ucwords(strtolower($_SESSION["cuenta"]));
       $clave = ucwords(strtolower($_SESSION["clave"])); 
    }     
    
?>