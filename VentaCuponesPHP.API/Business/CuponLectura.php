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
                    $cuponData['Habilitado']
                );
            }
            return null;
        } catch (Exception $e) {
            throw new Exception("Error al obtener el cupón por ID: " . $e->getMessage());
        }
    }

    public function obtenerTodosLosCupones() {
        try {
            $cuponesData = $this->cuponLecturaData->obtenerTodosLosCupones();
            $cupones = [];
            foreach ($cuponesData as $cuponData) {
                $cupones[] = new Cupon(
                    $cuponData['IDCupon'],
                    $cuponData['Nombre'],
                    $cuponData['Imagen'],
                    $cuponData['Ubicacion'],
                    $cuponData['PrecioCupon'],
                    $cuponData['IDEmpresa'],
                    $cuponData['IDCategoria'],
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
