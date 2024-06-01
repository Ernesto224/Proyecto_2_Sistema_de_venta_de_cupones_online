<?php
class Promocion{

    public $IDPromocion;
    public $FechaDeInicio;
    public $FechaDeVencimiento;
    public $Descuento;
    public $IDEmpresa;
    public $IDCupon;
    public $Habilitado;

    public function __construct($IDPromocion, $FechaDeInicio, 
    $FechaDeVencimiento, $Descuento, $IDEmpresa, $IDCupon
    , $Habilitado) 
    {
        $this->IDPromocion=$IDPromocion;
        $this->FechaDeInicio = $FechaDeInicio;
        $this->FechaDeVencimiento = $FechaDeVencimiento;
        $this->Descuento = $Descuento;
        $this->IDEmpresa = $IDEmpresa;
        $this->IDCupon = $IDCupon;
        $this->Habilitado = $Habilitado;
    }

    public function toJSON() {
        return json_encode(get_object_vars($this));
    }
}
?>