<?php
require_once "../Data/PromocionModificarData.php";
require_once "../Model/Promocion.php";

class PromocionModificar {
    private $promocionModificarData;

    public function __construct() {
        $this->promocionModificarData = new PromocionModificarData();
    }

    public function registrarPromocion(Promocion $promocion) {
        try {
            return $this->promocionModificarData->registrarPromocion($promocion);
        } catch (Exception $e) {
            throw new Exception("Error al registrar la promoción: " . $e->getMessage());
        }
    }

    public function actualizarPromocion(Promocion $promocion) {
        try {
            return $this->promocionModificarData->actualizarPromocion($promocion);
        } catch (Exception $e) {
            throw new Exception("Error al actualizar la promoción: " . $e->getMessage());
        }
    }

    public function eliminarPromocion($idPromocion, $estado) {
        try {
            return $this->promocionModificarData->eliminarPromocion($idPromocion, $estado);
        } catch (Exception $e) {
            throw new Exception("Error al eliminar la promoción: " . $e->getMessage());
        }
    }
}
?>
