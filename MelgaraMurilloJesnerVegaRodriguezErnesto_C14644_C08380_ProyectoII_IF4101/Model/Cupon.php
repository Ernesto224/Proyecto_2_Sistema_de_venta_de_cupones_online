<?php

class Cupon {
    public $IDCupon;
    public $Nombre;
    public $Imagen;
    public $Ubicacion;
    public $PrecioCuponBase;
    public $PrecioCuponVenta;
    public $FechaVencimientoOferta;
    public $IDEmpresa;
    public $Habilitado;
    public $EnPromocion;
    public function __construct($IDCupon, $Nombre, $Imagen, $Ubicacion, $PrecioCuponBase, $PrecioCuponVenta, $FechaVencimientoOferta, $IDEmpresa, $Habilitado, $EnPromocion) {
        $this->IDCupon = $IDCupon;
        $this->Nombre = $Nombre;
        $this->Imagen = $Imagen;
        $this->Ubicacion = $Ubicacion;
        $this->PrecioCuponBase = $PrecioCuponBase;
        $this->PrecioCuponVenta = $PrecioCuponVenta;
        $this->FechaVencimientoOferta = $FechaVencimientoOferta;
        $this->IDEmpresa = $IDEmpresa;
        $this->Habilitado = $Habilitado;
        $this -> EnPromocion = $EnPromocion;
    }

    public function toJSON() {
        return json_encode(get_object_vars($this));
    }
}

?>
