<?php
require_once "../Model/CategoriaCupon.php";

class CategoriaCuponLecturaData {

    private $pdo;
<<<<<<< HEAD
    private $host = "localhost:3306";
=======
    private $host = "localhost:3307";
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
    private $user = "root";
    private $password = "";
    private $bd = "tarea3_lenguajes_php";

    private function conectar() {
        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->bd, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die(json_encode(['error' => "Error!: No se pudo conectar a la bd " . $this->bd . " - " . $e->getMessage()]));
        }
    }

    private function desconectar() {
        $this->pdo = null;
    }

    function obtenerCategoriaPorId($id) {
        try {
            $this->conectar();
<<<<<<< HEAD
            $query = "SELECT * FROM CategoriaCupon WHERE IDCategoria = :id";
=======
            $query = "SELECT * FROM categoriacupon WHERE IDCategoria = :id";
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            $this->desconectar();
            if (!$resultado) {
                throw new Exception("Categoria no encontrada");
            }
            return $resultado;
        } catch (Exception $e) {
            $this->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }

    function obtenerTodasLasCategorias() {
        try {
            $this->conectar();
            $query = "SELECT * FROM categoriacupon";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $this->desconectar();
            if (!$resultado) {
                throw new Exception("No se encontraron categorias");
            }
            return $resultado;
        } catch (Exception $e) {
            $this->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }

} 
?>