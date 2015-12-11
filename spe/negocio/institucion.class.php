<?php

require_once '../datos/conexion.php';
class Institucion  extends Conexion{
    private $codigo;
    private $descripcion;
    private $telefono;
    
    function getTelefono() {
        return $this->telefono;
    }
    
    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
        
    function getCodigo() {
        return $this->codigo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    function listar(){
        try {
            $sql="select * from tbinstitucion 
                  order by ins_Codigo ";
            
            $sentencia =  $this->dblink->prepare($sql)OR DIE ("No se pudo Leer Estos Registro");
            $sentencia->execute();
            $registros = $sentencia->fetchAll();
            return $registros;
            
            } catch (Exception $exc) {
                echo $exc;
            }
    }
    
    public function agregar() {
        $this->dblink->beginTransaction();
        
        try {  
                
                $sql = "select fn_insertarInstitucion( '".$this->getDescripcion()."',"
                        . "'".$this->getTelefono()."')";
                
                 $sentencia =  $this->dblink->prepare($sql);
                 $sentencia->execute();
                $this->dblink->commit();                            
            
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }
        
        return true;        
    }
    
    public function editar() {
        $this->dblink->beginTransaction();
        
        try {
            $sql = "update tbinstitucion "
                    . "set "
                    . "ins_Nombre ='".$this->getDescripcion()."',"                  
                    . "ins_telefono ='".$this->getTelefono()."'"
                    . "where "
                    . "ins_Codigo = '".$this->getCodigo()."'";
            
             $sentencia =  $this->dblink->prepare($sql);
             $sentencia->execute();
            $this->dblink->commit();
            
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }
        
        return true;        
    }
    
    public function leerDatos($codigo) {
        try {
            $sql = "
                select
                        ins_Codigo,
                        ins_Nombre,
                        ins_telefono                      
                from
                        tbinstitucion                         
                where
                        ins_Codigo = '".$codigo."'
                ";
            $sentencia =  $this->dblink->prepare($sql) ;
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
      
        } catch (Exception $exc) {
            throw $exc;
        }            
    }
    public function eliminar() {
        try {
            $sql = "delete from tbinstitucion where ins_Codigo = '".$this->getCodigo()."'";
             $sentencia =  $this->dblink->prepare($sql) ;       
             $sentencia->execute();
                                                                    
        } catch (Exception $exc) {        
                                        
            throw $exc;
        }        
        return true;
        
    }

    public function ObtenerCodigo() {
        $this->dblink->beginTransaction();
        
        try {               
                $sql = "Select ins_Codigo from tbinstitucion order by ins_Codigo desc limit 1";
                
                $sentencia =  $this->dblink->prepare($sql);            
                $sentencia->execute();
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

                  
                $valor = (INTEGER)(substr($resultado["ins_codigo"], 3,3));   
                $codigo="";                                 
                $codigoss=$valor+1;
                
                if($codigoss>=0 && $codigoss <10){
                    
                    $codigo=(string)("INS00".$codigoss);
                    
                }else if($codigoss>=10&& $codigoss <100){
                    
                    $codigo=(string)("INS0".$codigoss);                  
                }else{
                    $codigo=(string)("INS".$codigoss);
                }
                return $codigo;                                                 
        } catch (Exception $exc) {        
                                        
            throw $exc;
        }        
        
        
    }


}
