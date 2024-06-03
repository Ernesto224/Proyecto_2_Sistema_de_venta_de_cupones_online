<?php
require_once "../Model/Promocion.php";

class PromocionLecturaData{

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

    function obtenerTodasLasPromocionesPorEmpresa($idEmpresa) {
        try {
            $this->conectar();
            $query = "SELECT * FROM promocion WHERE IDEmpresa = :idEmpresa";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(':idEmpresa', $idEmpresa, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $this->desconectar();
            if (!$resultado) {
                throw new Exception("No se encontraron promociones");
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