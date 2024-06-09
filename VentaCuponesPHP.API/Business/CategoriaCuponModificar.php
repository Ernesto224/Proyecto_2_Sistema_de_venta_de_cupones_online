<?php

require_once "../Data/CategoriaCuponModificarData.php";
require_once "../Model/CategoriaCupon.php";

class CategoriaCuponModificar {
    private $CategoriaCuponModificarData;

    public function __construct() {
        $this->CategoriaCuponModificarData = new CategoriaCuponModificarData();
    }

    public function registrarCategoriaCupon(CategoriaCupon $CategoriaCupon) {
        return $this->CategoriaCuponModificarData->registrarCategoriaCupon($CategoriaCupon);
    }

    public function actualizarCategoriaCupon(CategoriaCupon $CategoriaCupon) {
        return $this->CategoriaCuponModificarData->actualizarCategoriaCupon($CategoriaCupon);
    }
}
?>