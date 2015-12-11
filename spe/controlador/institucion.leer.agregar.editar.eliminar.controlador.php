<?php

require_once '../negocio/institucion.class.php';

$operacion = $_POST["a_operacion"];

$objInstitucion = new Institucion();

//LECTURA DE DATOS
if ($operacion=="leer"){ 
    $codigoInstitucion = $_POST["p_codigo"];
    $resultado = $objInstitucion->leerDatos($codigoInstitucion);
    echo json_encode($resultado);
}

//OPERACION DE AGREGAR Y EDITAR
if ($operacion=="agregar" || $operacion=="editar"){
    parse_str($_POST["p_array_datos"], $datosFrm);    
    if ($datosFrm["txttipooperacion"]=="editar"){   
    $objInstitucion->setCodigo($datosFrm["txtcodigo"]);    
    }
    $objInstitucion->setDescripcion($datosFrm["txtnombre"]);
    $objInstitucion->setTelefono($datosFrm["txttelefono"]);    
}

//ELIMINAR UNO Y VARIOS REGISTROS
if ($operacion=="eliminar"){  
    $codigoInstitucion = $_POST["p_codigo"];
    $resultado = $objInstitucion->setCodigo($codigoInstitucion);
}


//OBTENER EL CODIGO DE REGISTRO
if ($operacion=="codigo"){  
     $registros = $objInstitucion->ObtenerCodigo();        
        echo($registros);
}

try {
    
    //CONFIRMANDO OPERACION DE AGREGAR , EDITAR Y ELIMINAR
    if ($operacion=="agregar" || $operacion=="editar"){
        if ($datosFrm["txttipooperacion"]=="editar"){
        if ($objInstitucion->editar()==true){
            echo "exito";
        }
    }elseif($datosFrm["txttipooperacion"]=="agregar"){
        if ($objInstitucion->agregar()==true){
            echo "exito";
        }
    }
    }elseif($operacion=="eliminar") {
        if($objInstitucion->eliminar()){
            echo"exito";
        }
    }
    
} catch (Exception $ex) {
    header("HTTP/1.1 500");
    echo $ex->getMessage();
}
