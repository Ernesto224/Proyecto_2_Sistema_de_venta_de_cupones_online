<?php
require_once "../Data/EmpresaModificarData.php";

class EmpresaModificar {
    private $empresaModificarData;

    public function __construct() {
        $this->empresaModificarData = new EmpresaModificarData();
    }

    public function registrarEmpresa(Empresa $empresa) {
        try {
            return $this->empresaModificarData->registrarEmpresa($empresa);
        } catch (Exception $e) {
            throw new Exception("Error al registrar la empresa: " . $e->getMessage());
        }
    }

    public function actualizarEmpresa(Empresa $empresa) {
        try {
            return $this->empresaModificarData->actualizarEmpresa($empresa);
        } catch (Exception $e) {
            throw new Exception("Error al actualizar la empresa: " . $e->getMessage());
        }
    }

    public function eliminarEmpresa($id) {
        try {
            return $this->empresaModificarData->eliminarEmpresa($id);
        } catch (Exception $e) {
            throw new Exception("Error al eliminar la empresa: " . $e->getMessage());
        }
    }
}
?>
