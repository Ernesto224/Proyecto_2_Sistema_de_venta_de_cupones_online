<?php
require_once "../Model/CategoriaCupon.php";

class CategoriaCuponModificarData{

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

    public function registrarCategoriaCupon(CategoriaCupon $categoriaCupon) {
        try {
            $this->conectar();
            $query = "INSERT INTO CategoriaCupon(Nombre, Descripcion) 
                        VALUES (:Nombre, :Descripcion)";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(':Nombre', $categoriaCupon->Nombre);
            $sentencia->bindParam(':Descripcion', $categoriaCupon->Descripcion);
            $sentencia->execute();
            $idAutoIncrement = $this->pdo->lastInsertId();
            $sentencia->closeCursor();
            $this->desconectar();
            return $idAutoIncrement;
        } catch (Exception $e) {
            $this->desconectar();
            die("Error: " . $e->getMessage());
        }
    }

    public function actualizarCategoria(CategoriaCupon $categoriaCupon) {
        try {
            $this->conectar();
            $query = "UPDATE categoriacupon SET
                    Nombre= :Nombre,
                    Descripcion= :Descripcion 
                    WHERE IDCategoria= :IDCategoria";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(':IDCategoria', $categoriaCupon->IDCategoria);
            $sentencia->bindParam(':Nombre', $categoriaCupon->Nombre);
            $sentencia->bindParam(':Descripcion', $categoriaCupon->Descripcion);
            $sentencia->execute();
            $sentencia->closeCursor();
            $this->desconectar();
            return true;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>