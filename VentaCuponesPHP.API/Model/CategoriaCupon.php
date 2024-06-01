<?php
class CategoriaCupon{

    public $IDCategoria;
    public $Nombre;
    public $Descripcion;

    public function __construct($IDCategoria, $Nombre, 
    $Descripcion)
    {
        $this->IDCategoria = $IDCategoria;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
    }

    public function toJSON() {
        return json_encode(get_object_vars($this));
    }
}
?>