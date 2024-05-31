<?php

require_once "../Data/UsuarioEmpresaModificar.php";

class UsuarioEmpresaModificar{
    private $usuarioEmpresaModificarData;

    public function __construct(){
        $this->usuarioEmpresaModificarData = new UsuarioEmpresaModificarData();
    }

    public function cambiarContrasenia($nuevaContrasenia, $idUsuario){
        try {
            // Corregir la llamada al método en la propiedad $usuarioEmpresaModificarData
            return $this->usuarioEmpresaModificarData->cambiarContrasenia($nuevaContrasenia, $idUsuario);

        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>
