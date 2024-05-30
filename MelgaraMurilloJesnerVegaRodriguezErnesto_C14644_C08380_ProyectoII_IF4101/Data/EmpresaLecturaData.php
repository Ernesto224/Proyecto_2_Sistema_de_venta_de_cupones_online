<?php
require_once "../Model/Empresa.php";

class EmpresaLecturaData {
    private $pdo;

    public function __construct() {
        $this->pdo = null;
        $this->host = "localhost:3306";
        $this->user = "root";
        $this->password = "";
        $this->bd = "lenguajes";
    }

    private function conectar() {
        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->bd, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error!: No se pudo conectar a la bd " . $this->bd . "<br/>\nError!: " . $e->getMessage() . "<br/>");
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
            die("Error: " . $e->getMessage());
            return null;
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
            die("Error: " . $e->getMessage());
            return null;
        }
    }
}
?>
