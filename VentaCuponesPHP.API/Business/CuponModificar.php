<?php
require_once "../Data/CuponModificarData.php";

class CuponModificar {
    private $cuponModificarData;

    public function __construct() {
        $this->cuponModificarData = new CuponModificarData();
    }

    public function registrarCupon(Cupon $cupon) {
        return $this->cuponModificarData->registrarCupon($cupon);
    }

    public function actualizarCupon(Cupon $cupon) {
        return $this->cuponModificarData->actualizarCupon($cupon);
    }

    public function eliminarCupon($id) {
        return $this->cuponModificarData->eliminarCupon($id);
    }
}
?>
