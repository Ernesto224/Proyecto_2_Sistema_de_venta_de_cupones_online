<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/CategoriaCupon.php";

class CategoriaCuponLecturaData {
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }

    function obtenerCategoriaPorId($id) {
        try {
            $this->dbContext->conectar();
            $query = "SELECT 
                `IDCategoria`, 
                `Nombre`, 
                `Descripcion` 
                FROM `categoriacupon` 
                WHERE IDCategoria = :id";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            $this->dbContext->desconectar();
            if (!$resultado) {
                throw new Exception("Categoria no encontrada");
            }
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }

    function obtenerTodasLasCategorias() {
        try {
            $this->dbContext->conectar();
            $query = "SELECT 
                `IDCategoria`, 
                `Nombre`, 
                `Descripcion` 
                FROM `categoriacupon`";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $this->dbContext->desconectar();
            if (!$resultado) {
                throw new Exception("No se encontraron categorias");
            }
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }
} 
?>