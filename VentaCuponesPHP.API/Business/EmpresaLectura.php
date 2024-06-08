<?php
require_once "../Data/EmpresaLecturaData.php";
require_once "../Model/Empresa.php";
require_once "../Model/Cupon.php";

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

    public function verificarInicioSesion($NombreUsuario, $Contrasenia) {
        try {
            $empresaData = $this->empresaLecturaData->verificarInicioSesion($NombreUsuario, $Contrasenia);
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
            throw new Exception("Error al actualizar la empresa: " . $e->getMessage());
        }
    }
    
    public function obtenerCuponesEmpresa($IdEmpresa): ?array {
        try {
            $cuponesData = $this->empresaLecturaData->obtenerCuponesEmpresa($IdEmpresa);
            $cupones = [];
            foreach ($cuponesData as $cuponAux) {
                $cupones[] = new Cupon(
                    $cuponAux['IDCupon'],
                    $cuponAux['Nombre'],
                    $cuponAux['Imagen'],
                    $cuponAux['Ubicacion'],
                    $cuponAux['PrecioCupon'],
                    $cuponAux['IDEmpresa'],
                    $cuponAux['IDCategoria'],
                    null,
                    $cuponAux['Habilitado']
                );
                # code...
            }
            return $cupones;
        }  catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function obtenerPromocionesEmpresa($IdEmpresaPromocion): ?array {
        try {
            $promocionesData = $this->empresaLecturaData->obtenerPromocionesEmpresa($IdEmpresaPromocion);
            $promociones = [];
            foreach ($promocionesData as $promocionAux) {
                $promociones[] = new Promocion(
                    $promocionAux['IDPromocion'],
                    $promocionAux['FechaDeInicio'],
                    $promocionAux['FechaDeVencimiento'],
                    $promocionAux['Descuento'],
                    $promocionAux['IDEmpresa'],
                    $promocionAux['IDCupon'],
                    $promocionAux['Habilitado']
                );
                # code...
            }
            return $promociones;
        }  catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
    
}
?>