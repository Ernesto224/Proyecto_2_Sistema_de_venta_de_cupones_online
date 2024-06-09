<?php
require_once "../Data/CategoriaCuponLecturaData.php";
require_once "../Model/CategoriaCupon.php";

class CategoriaCuponLectura {
    private $categoriaCuponLecturaData;

    public function __construct() {
        $this->categoriaCuponLecturaData = new CategoriaCuponLecturaData();
    }

    public function obtenerCategoriaPorId($id) {
        try {
            $categoriaData = $this->categoriaCuponLecturaData->obtenerCategoriaPorId($id);
            if ($categoriaData) {
                return new CategoriaCupon(
                    $categoriaData['IDCategoria'],
                    $categoriaData['Nombre'],
                    $categoriaData['Descripcion']
                );
            }
            return null;
        } catch (Exception $e) {
            throw new Exception("Error al obtener la categoria por ID: " . $e->getMessage());
        }
    }

    public function obtenerTodasLasCategorias() {
        try {
            $categoriasData = $this->categoriaCuponLecturaData->obtenerTodasLasCategorias();
            $categorias = [];
            foreach ($categoriasData as $categoriaData) {
                $categorias[] = new CategoriaCupon(
                    $categoriaData['IDCategoria'],
                    $categoriaData['Nombre'],
                    $categoriaData['Descripcion']
                );
            }
            return $categorias;
        } catch (Exception $e) {
            throw new Exception("Error al obtener todas las categorias: " . $e->getMessage());
        }
    }
    
}
?>
