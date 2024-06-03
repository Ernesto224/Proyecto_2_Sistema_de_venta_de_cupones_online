<?php
require_once "../Model/CategoriaCupon.php";

class CategoriaCuponModificarData{

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

    public function registrarCategoriaCupon(CategoriaCupon $categoriaCupon) {
        try {
            $this->conectar();
<<<<<<< HEAD
            $query = "INSERT INTO CategoriaCupon(Nombre, Descripcion) 
=======
            $query = "INSERT INTO `categoriacupon`(`Nombre`, `Descripcion`) 
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
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
<<<<<<< HEAD
            $query = "UPDATE categoriacupon SET
                    Nombre= :Nombre,
                    Descripcion= :Descripcion 
                    WHERE IDCategoria= :IDCategoria";
=======
            $query = "UPDATE `categoriacupon` SET
                    `Nombre`= :Nombre,
                    `Descripcion`= :Descripcion 
                    WHERE `IDCategoria`= :IDCategoria";
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
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