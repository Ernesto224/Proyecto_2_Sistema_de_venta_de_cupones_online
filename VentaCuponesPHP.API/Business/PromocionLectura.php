<?php
require_once "../Data/PromocionLecturaData.php";
require_once "../Model/Promocion.php";

class PromocionLectura{

    private $promocionLecturaData;

    public function __construct(){
        $this->promocionLecturaData = new PromocionLecturaData();
    }

    function obtenerTodasLasPromocionesPorEmpresa($idEmpresa) {
        try {
           $promocionesData = $this->promocionLecturaData->obtenerTodasLasPromocionesPorEmpresa($idEmpresa);
           $promociones = [];
           foreach ($promocionesData as $promocion) { 
                $promociones[] = new Promocion(
                    $promocion['IDPromocion'],
                    $promocion['FechaDeInicio'],
                    $promocion['FechaDeVencimiento'],
                    $promocion['Descuento'],
                    $promocion['IDEmpresa'],
                    $promocion['IDCupon'],
                    $promocion['Habilitado'],
                );
           } 
           return $promociones;
        } catch (Exception $e) {
            throw new Exception("Error al obtener todas las promociones: " . $e->getMessage());
        }
    }
}
?>