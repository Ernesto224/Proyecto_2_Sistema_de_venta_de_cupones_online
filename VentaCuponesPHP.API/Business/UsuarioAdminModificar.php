<?php
require_once "../Data/UsuarioAdminModificarData.php";

class UsuarioAdminModificar {
    private $usuarioAdminModificarData;

    public function __construct() {
        $this->usuarioAdminModificarData = new UsuarioAdminModificarData();
    }

    public function actualizarInfoJuridicaEmpresa(Empresa $empresa) {
        try {
            return $this->usuarioAdminModificarData->actualizarInfoJuridicaEmpresa($empresa);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function actualizarHabilitacionCupon(Cupon $cupon) {
        try {
            return $this->usuarioAdminModificarData->actualizarHabilitacionCupon($cupon);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function insertarDatosInicioSesionEmpresa($idEmpresa, $nombreUsuario, $contrasenia) {
        try {
            return $this->usuarioAdminModificarData->insertarDatosInicioSesionEmpresa($idEmpresa, $nombreUsuario, $contrasenia);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
