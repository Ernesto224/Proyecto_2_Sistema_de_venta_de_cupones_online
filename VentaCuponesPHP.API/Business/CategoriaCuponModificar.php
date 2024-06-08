<?php
<<<<<<< HEAD
require_once "../Data/CategoriaCuponModificarData.php";
=======
require_once "../Data/CuponModificarData.php";
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89

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
