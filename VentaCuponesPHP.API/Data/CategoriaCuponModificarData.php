<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/CategoriaCupon.php";

class CategoriaCuponModificarData{
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }

    public function registrarCategoriaCupon(CategoriaCupon $categoriaCupon) {
        try {
            $this->dbContext->conectar();
            $query = "INSERT INTO CategoriaCupon
                (Nombre, 
                Descripcion) 
                VALUES (:Nombre, 
                :Descripcion)";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':Nombre', $categoriaCupon->Nombre);
            $sentencia->bindParam(':Descripcion', $categoriaCupon->Descripcion);
            $sentencia->execute();
            $idAutoIncrement = $this->dbContext->retornarUltimoId();
            $sentencia->closeCursor();
            $this->dbContext->desconectar();
            return $idAutoIncrement;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            return -1;
        }
    }

    public function actualizarCategoriaCupon(CategoriaCupon $categoriaCupon) {
        try {
            $this->dbContext->conectar();
            $query = "UPDATE categoriacupon SET
                    Nombre = :Nombre,
                    Descripcion = :Descripcion 
                    WHERE IDCategoria = :IDCategoria";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':IDCategoria', $categoriaCupon->IDCategoria);
            $sentencia->bindParam(':Nombre', $categoriaCupon->Nombre);
            $sentencia->bindParam(':Descripcion', $categoriaCupon->Descripcion);
            $sentencia->execute();
            $sentencia->closeCursor();
            $this->dbContext->desconectar();
            return true;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            return false;
        }
    }
}
?>