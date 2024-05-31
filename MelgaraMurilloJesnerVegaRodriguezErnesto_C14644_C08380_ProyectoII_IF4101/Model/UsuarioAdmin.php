<?php

class UsuarioAdmin {
    public $IDUsuarioAdmin;
    public $NombreUsuario;
    public $Contrasenia;

    public function __construct($IDUsuarioAdmin, $NombreUsuario, $Contrasenia) {
        $this->IDUsuarioAdmin = $IDUsuarioAdmin;
        $this->NombreUsuario = $NombreUsuario;
        $this->Contrasenia = $Contrasenia;
    }

    public function toJSON() {
        return json_encode(get_object_vars($this));
    }
}

?>
