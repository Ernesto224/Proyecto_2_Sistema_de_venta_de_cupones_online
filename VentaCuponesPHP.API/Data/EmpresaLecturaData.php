<?php
require_once "../Model/Empresa.php";

class EmpresaLecturaData {
    private $pdo;
    private $host = "localhost:3306";
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

    public function obtenerEmpresaPorId($id): ?array {
        try {
            $this->conectar();
            $query = "SELECT * FROM Empresa WHERE IDEmpresa = :id";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            $this->desconectar();
            return $resultado;
        } catch (Exception $e) {
            die(json_encode(['error' => "Error: " . $e->getMessage()]));
        }
    }

    public function obtenerTodasLasEmpresas(): ?array {
        try {
            $this->conectar();
            $query = "SELECT * FROM Empresa";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $this->desconectar();
            return $resultado;
        } catch (Exception $e) {
            die(json_encode(['error' => "Error: " . $e->getMessage()]));
        }
    }
}
?>