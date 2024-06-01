<?php
require_once "../Data/EmpresaLecturaData.php";
require_once "../Model/Empresa.php";

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
                    $empresaData['NombreUsuario'],
                    $empresaData['Contrasenia'],
                    $empresaData['Habilitado'],
                    $empresaData['CredencialesTemporales']
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
                    $empresaData['NombreUsuario'],
                    $empresaData['Contrasenia'],
                    $empresaData['Habilitado'],
                    $empresaData['CredencialesTemporales']
                );
            }
            return $empresas;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>