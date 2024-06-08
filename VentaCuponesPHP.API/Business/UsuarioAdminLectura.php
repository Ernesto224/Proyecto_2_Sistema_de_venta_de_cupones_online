<?php
require_once "../Data/UsuarioAdminLecturaData.php";

class UsuarioAdminLectura{
    private $usuarioAdminData;

    public function __construct(){
        $this-> usuarioAdminData = new UsuarioAdminLecturaData();
    }
    
    public function verificarInicioSesion($NombreUsuario, $Contrasenia){
        try {
            return $this->usuarioAdminData->verificarInicioSesion($NombreUsuario, $Contrasenia);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>