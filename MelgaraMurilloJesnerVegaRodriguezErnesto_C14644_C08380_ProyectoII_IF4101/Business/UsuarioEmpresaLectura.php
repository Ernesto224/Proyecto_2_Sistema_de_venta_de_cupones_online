<?php

require_once "../Data/UsuarioEmpresaLecturaData.php";

class UsuarioEmpresaLectura {
    private $usuarioEmpresaLecturaData;

    public function __construct() {
        $this->usuarioEmpresaLecturaData = new UsuarioEmpresaLecturaData();
    }

    public function verificarInicioSesion($nombreUsuario, $contrasenia) {
        try {
            return $this->usuarioEmpresaLecturaData->verificarInicioSesion($nombreUsuario, $contrasenia);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}


?>