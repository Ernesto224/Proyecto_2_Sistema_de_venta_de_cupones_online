<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/Cupon.php";

class CuponModificarData {
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }

    public function registrarCupon(Cupon $cupon) {
        try {
            $this->dbContext->conectar();
            $query = "INSERT INTO Cupon 
                (Nombre, 
                Imagen, 
                Ubicacion, 
                PrecioCupon, 
                IDEmpresa, 
                IDCategoria, 
                Habilitado)
             VALUES(:Nombre, 
                :Imagen, 
                :Ubicacion, 
                :PrecioCupon, 
                :IDEmpresa, 
                :IDCategoria, 
                :Habilitado)";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':Nombre', $cupon->Nombre);
            $sentencia->bindParam(':Imagen', $cupon->Imagen);
            $sentencia->bindParam(':Ubicacion', $cupon->Ubicacion);
            $sentencia->bindParam(':PrecioCupon', $cupon->PrecioCupon);
            $sentencia->bindParam(':IDEmpresa', $cupon->IDEmpresa);
            $sentencia->bindParam(':IDCategoria', $cupon->IDCategoria);
            $sentencia->bindParam(':Habilitado', $cupon->Habilitado,PDO::PARAM_INT);
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
    
    public function actualizarCupon(Cupon $cupon) {
        try {
            $this->dbContext->conectar();
            $query = "UPDATE Cupon SET 
                Nombre = :Nombre, 
                Imagen = :Imagen, 
                Ubicacion = :Ubicacion,
                PrecioCupon = :PrecioCupon, 
                IDEmpresa = :IDEmpresa,
                IDCategoria = :IDCategoria,
                Habilitado = :Habilitado
                WHERE IDCupon = :IDCupon";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':Nombre', $cupon->Nombre);
            $sentencia->bindParam(':Imagen', $cupon->Imagen);
            $sentencia->bindParam(':Ubicacion', $cupon->Ubicacion);
            $sentencia->bindParam(':PrecioCupon', $cupon->PrecioCupon);
            $sentencia->bindParam(':IDEmpresa', $cupon->IDEmpresa);
            $sentencia-> bindParam(':IDCategoria', $cupon->IDCategoria);
            $sentencia->bindParam(':Habilitado', $cupon->Habilitado);
            $sentencia->bindParam(':IDCupon', $cupon->IDCupon);
            $sentencia->execute();
            $sentencia->closeCursor();
            $this->dbContext->desconectar();
            return true;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            return false;
        }
    }

    public function habilitarInabilitarCupon($idCupon, $estado) {
        try {
            $this->dbContext->conectar();
            $query = "UPDATE Cupon 
                SET Habilitado = :Estado 
                WHERE IDCupon = :IDCupon";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':Estado', $estado, PDO::PARAM_INT);
            $sentencia->bindParam(':IDCupon', $idCupon, PDO::PARAM_INT);
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