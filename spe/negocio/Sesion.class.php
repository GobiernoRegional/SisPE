<?php

require_once '../datos/conexion.php';

class Sesion extends Conexion {
    private $usuario;
    private $clave;
    private $recordar;
    
    public function getRecordar() {
        return $this->recordar;
    }

    public function setRecordar($recordar) {
        $this->recordar = $recordar;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

        
    public function iniciarSesion() {
        try {
            $sql = "
                    select 
                        usu_Nombre as usuario, 
                        usu_Estado,
                        usu_clave, 
                        per_Nombre as nombre,
                        per_Apellido as apellido,
                        car_Nombre as cargo,
                        upe_mantenimiento as umantenimiento,
			upe_usuario as upermiso,
			upe_personal as upersonal,
			upe_institucion as uinstitucion ,
			upe_cargo as ucargo
                    from 
                        tbusuario u
                        inner join tbpersonal p on (u.usu_per_Codigo = p.per_Codigo)
                        inner join tbcargo c on(p.per_car_Codigo = c.car_Codigo)
                        inner join tbusuario_permiso pm on (u.usu_upe_codigo=pm.upe_codigo)
                    where 
                        upper(usu_Nombre)= upper(:p_usuario)
                    ";

            $sentecia = $this->dblink->prepare($sql);
            $sentecia->bindParam(":p_usuario", $this->getUsuario());
            $sentecia->execute();
            $resultado = $sentecia->fetch();

            if ($resultado["usu_clave"] == md5($this->getClave())){
                if ($resultado["usu_Estado"] == "I"){
                    return 2;
                }else{
                    session_name("sistema-spe");
                    session_start();
                    $_SESSION["usuario"] = $resultado["nombre"].' '.$resultado["apellido"];
                    $_SESSION["cargo"] = $resultado["cargo"];
                    $_SESSION["cuenta"] = $resultado["usuario"];
                    $_SESSION["clave"]= $this->getClave();
                    $_SESSION["pmantenimiento"]= $resultado["umantenimiento"];
                    $_SESSION["ppermiso"]= $resultado["ppermiso"];
                    $_SESSION["ppersonal"]= $resultado["ppersonal"];
                    $_SESSION["pdinstitucion"]= $resultado["uinstitucion"];
                    $_SESSION["pcargo"]= $resultado["ucargo"];
                    

                    if ($this->getRecordar()=="S"){
                        setcookie("usuariousuario", $this->getUsuario(), 0, "/");
                    }else{
                        setcookie("usuariousuario", "", 0, "/");
                    }
                    

                    return 1;
                }
            }

            return -1;
        } catch (Exception $exc) {
            throw $exc;
        }
    }   

    
}
