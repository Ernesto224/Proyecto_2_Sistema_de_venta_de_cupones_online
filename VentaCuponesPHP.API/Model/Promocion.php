<?php

class Promocion{

    public $FechaDeInicio;
    public $FechaDeVencimiento;
    public $Descuento;
    public $IDEmpresa;
    public $IDCupon;

    public function __construct($FechaDeInicio, $FechaDeVencimiento,
    $Descuento, $IDEmpresa, $IDCupon) 
    {
        $this->FechaDeInicio = $FechaDeInicio;
        $this->FechaDeVencimiento = $FechaDeVencimiento;
        $this->Descuento = $Descuento;
        $this->IDEmpresa = $IDEmpresa;
        $this->IDCupon = $IDCupon;
    }

    public function toJSON() {
        return json_encode(get_object_vars($this));
    }
}

?>