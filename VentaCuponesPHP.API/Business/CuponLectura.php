<?php
require_once "../Data/CuponLecturaData.php";
require_once "../Model/Cupon.php";

class CuponLectura {
    private $cuponLecturaData;

    public function __construct() {
        $this->cuponLecturaData = new CuponLecturaData();
    }

    public function obtenerCuponPorId($id) {
        try {
            $cuponData = $this->cuponLecturaData->obtenerCuponPorId($id);
            if ($cuponData) {
                return new Cupon(
                    $cuponData['IDCupon'],
                    $cuponData['Nombre'],
                    $cuponData['Imagen'],
                    $cuponData['Ubicacion'],
                    $cuponData['PrecioCupon'],
                    $cuponData['IDEmpresa'],
                    $cuponData['IDCategoria'],
                    null,
                    $cuponData['Habilitado']
                );
            }
            return null;
        } catch (Exception $e) {
            throw new Exception("Error al obtener el cupón por ID: " . $e->getMessage());
        }
    }

    public function obtenerTodosLosCupones($categoria, $termino, $pagina) {
        try {
            $cuponesData = $this->cuponLecturaData->obtenerTodosLosCupones($categoria, $termino, $pagina);
            $cupones = [];
            foreach ($cuponesData as $cuponData) {
                $cupones[] = new Cupon(
                    $cuponData['IDCupon'],
                    $cuponData['Nombre'],
                    $cuponData['Imagen'],
                    $cuponData['Ubicacion'],
                    $cuponData['PrecioCupon'],
                    $cuponData['NombreEmpresa'],
                    $cuponData['NombreCategoria'],
                    $cuponData['Descuento'],
                    $cuponData['Habilitado']
                );
            }
            return $cupones;
        } catch (Exception $e) {
            throw new Exception("Error al obtener todos los cupones: " . $e->getMessage());
        }
    }
}
?>
