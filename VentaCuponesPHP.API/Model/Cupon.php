<?php
class Cupon {
    public $IDCupon;
    public $Nombre;
    public $Imagen;
    public $Ubicacion;
    public $PrecioCupon;
    public $IDEmpresa;
    public $IDCategoria;
    public $Descuento;
    public $Habilitado;
    
    public function __construct($IDCupon, $Nombre, $Imagen, 
    $Ubicacion, $PrecioCupon, $IDEmpresa, $IDCategoria,
    $Descuento, $Habilitado) 
    {
        $this->IDCupon = $IDCupon;
        $this->Nombre = $Nombre;
        $this->Imagen = $Imagen;
        $this->Ubicacion = $Ubicacion;
        $this->PrecioCupon = floatval($PrecioCupon);
        $this->IDEmpresa = $IDEmpresa;
        $this->IDCategoria = $IDCategoria;
        $this->Descuento = floatval($Descuento);
        $this->Habilitado = $Habilitado;
    }

    public function toJSON() {
        return json_encode(get_object_vars($this));
    }
}
?>
