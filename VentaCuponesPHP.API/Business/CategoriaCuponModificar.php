<?php
require_once "../Data/CategoriaCuponModificarData.php";

class CategoriaCuponModificar {
    private $CategoriaCuponModificarData;

    public function __construct() {
        $this->CategoriaCuponModificarData = new CategoriaCuponModificarData;
    }

    public function registrarCategoriaCupon(CategoriaCupon $CategoriaCupon) {
        return $this->CategoriaCuponModificarData->registrarCategoriaCupon($CategoriaCupon);
    }

    public function actualizarCategoria(CategoriaCupon $CategoriaCupon) {
        return $this->CategoriaCuponModificarData->actualizarCategoria($CategoriaCupon);
    }
}
?>
