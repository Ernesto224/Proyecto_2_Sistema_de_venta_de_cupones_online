<?php

class UsuarioEmpresa {
    public $IDUsuarioEmpresa;
    public $NombreUsuario;
    public $Contrasenia;
    public $IDEmpresa;
    public $Habilitado;

    public function __construct($IDUsuarioEmpresa, $NombreUsuario, $Contrasenia, $IDEmpresa, $Habilitado) {
        $this->IDUsuarioEmpresa = $IDUsuarioEmpresa;
        $this->NombreUsuario = $NombreUsuario;
        $this->Contrasenia = $Contrasenia;
        $this->IDEmpresa = $IDEmpresa;
        $this->Habilitado = $Habilitado;
    }

    public function toJSON() {
        return json_encode(get_object_vars($this));
    }
}

?>
