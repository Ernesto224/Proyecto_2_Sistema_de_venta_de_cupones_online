<?php
class ContextoDeBaseDeDatos{
    private $pdo;
    private $host = "localhost:3306";
    private $user = "root";
    private $password = "";
    private $bd = "tarea3_lenguajes_php";

    public function conectar() {
        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->bd, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die(json_encode(['error' => "Error!: No se pudo conectar a la bd " . $this->bd . " - " . $e->getMessage()]));
        }
    }

    public function desconectar() {
        $this->pdo = null;
    }

    public function prepararSentencia($query) {
        return $this->pdo->prepare($query);
    }

    public function retornarUltimoId() {
        return $this->pdo->lastInsertId();
    }
}    
?>