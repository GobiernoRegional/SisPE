<?php

require_once '../datos/conexion.php';

class Usuario extends Conexion {
    private $usuario;
    private $clave_antigua;
    private $clave_nueva;
    private $repeti_clave;   
    function getUsuario() {
        return $this->usuario;
    }

    function getClave_antigua() {
        return $this->clave_antigua;
    }

    function getClave_nueva() {
        return $this->clave_nueva;
    }

    function getRepeti_clave() {
        return $this->repeti_clave;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setClave_antigua($clave_antigua) {
        $this->clave_antigua = $clave_antigua;
    }

    function setClave_nueva($clave_nueva) {
        $this->clave_nueva = $clave_nueva;
    }

    function setRepeti_clave($repeti_clave) {
        $this->repeti_clave = $repeti_clave;
    }

    public function ModificarClaveUsuario() {
        
        $this->dblink->beginTransaction();
        try {
            $sql=" 
                update 
                    tbusuario
                set 
                    usu_clave=md5(:clv_nueva)
                where
                    upper(usu_nombre)=upper(:usu) and 
                    usu_clave=md5(:clv_antigua)           
                ";
            
            $sentencia = $this->dblink->prepare($sql)OR DIE ("No se pudo Modificar el Registro");
            $sentencia->bindParam(":usu", $this->getUsuario());
            $sentencia->bindParam(":clv_antigua", $this->getClave_antigua());
            $sentencia->bindParam(":clv_nueva", $this->getClave_nueva());
            $sentencia->execute();
            $this->dblink->commit();
        } catch (Exception $exc) {
            echo $exc->getMessage();
           
        }
         return true;
    }
        
        
}
