<?php

class Empresa {
    public $IDEmpresa;
    public $NombreEmpresa;
    public $DireccionFisica;
    public $CedulaFisicaJuridica;
    public $FechaCreacion;
    public $CorreoElectronico;
    public $Telefono;
    public $NombreUsuario;
    public $Contrasenia;
    public $Habilitado;
    public $CredencialesTemporales;

    public function __construct($IDEmpresa, $NombreEmpresa, 
    $DireccionFisica, $CedulaFisicaJuridica, $FechaCreacion, 
    $CorreoElectronico, $Telefono, $NombreUsuario, $Contrasenia, 
    $Habilitado, $CredencialesTemporales) 
    {
        $this->IDEmpresa = $IDEmpresa;
        $this->NombreEmpresa = $NombreEmpresa;
        $this->DireccionFisica = $DireccionFisica;
        $this->CedulaFisicaJuridica = $CedulaFisicaJuridica;
        $this->FechaCreacion = $FechaCreacion;
        $this->CorreoElectronico = $CorreoElectronico;
        $this->Telefono = $Telefono;
        $this->NombreUsuario = $NombreUsuario;
        $this->Contrasenia = $Contrasenia;
        $this->Habilitado = $Habilitado;
        $this->CredencialesTemporales = $CredencialesTemporales;
    }

    public function toJSON() {
        return json_encode(get_object_vars($this));
    }
}

?>
