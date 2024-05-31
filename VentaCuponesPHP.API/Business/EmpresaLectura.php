<?php
require_once "../Data/EmpresaLecturaData.php";

class EmpresaLectura {
    private $empresaLecturaData;

    public function __construct() {
        $this->empresaLecturaData = new EmpresaLecturaData();
    }

    public function obtenerEmpresaPorId($id): ?Empresa {
        try {
            $empresaData = $this->empresaLecturaData->obtenerEmpresaPorId($id);
            if ($empresaData) {
                return new Empresa(
                    $empresaData['IDEmpresa'],
                    $empresaData['NombreEmpresa'],
                    $empresaData['DireccionFisica'],
                    $empresaData['CedulaFisicaJuridica'],
                    $empresaData['FechaCreacion'],
                    $empresaData['CorreoElectronico'],
                    $empresaData['Telefono'],
                    $empresaData['Contrasenia'],
                    $empresaData['Habilitado']
                );
            }
            return null;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function obtenerTodasLasEmpresas(): ?array {
        try {
            $empresasData = $this->empresaLecturaData->obtenerTodasLasEmpresas();
            $empresas = [];
            foreach ($empresasData as $empresaData) {
                $empresas[] = new Empresa(
                    $empresaData['IDEmpresa'],
                    $empresaData['NombreEmpresa'],
                    $empresaData['DireccionFisica'],
                    $empresaData['CedulaFisicaJuridica'],
                    $empresaData['FechaCreacion'],
                    $empresaData['CorreoElectronico'],
                    $empresaData['Telefono'],
                    $empresaData['Contrasenia'],
                    $empresaData['Habilitado']
                );
            }
            return $empresas;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
