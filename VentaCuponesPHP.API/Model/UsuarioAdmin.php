<?php

class UsuarioAdmin {
    public $IDAdmin;
    public $NombreUsuario;
    public $Contrasenia;

    public function __construct($IDAdmin, $NombreUsuario, $Contrasenia) {
        $this->IDAdmin = $IDAdmin;
        $this->NombreUsuario = $NombreUsuario;
        $this->Contrasenia = $Contrasenia;
    }

    public function toJSON() {
        return json_encode(get_object_vars($this));
    }
}

?>
