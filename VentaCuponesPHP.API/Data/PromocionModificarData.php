<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/Promocion.php";

class PromocionModificarData {
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }

    public function registrarPromocion(Promocion $promocion) {
        try {
            $this->dbContext->conectar();
            $query = "INSERT INTO `promocion`
                (`FechaDeInicio`, 
                `FechaDeVencimiento`, 
                `Descuento`, 
                `IDEmpresa`, 
                `IDCupon`, 
                `Habilitado`) 
                VALUES (:FechaDeInicio, 
                :FechaDeVencimiento, 
                :Descuento, 
                :IDEmpresa, 
                :IDCupon, 
                :Habilitado)";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':FechaDeInicio', $promocion->FechaDeInicio);
            $sentencia->bindParam(':FechaDeVencimiento', $promocion->FechaDeVencimiento);
            $sentencia->bindParam(':Descuento', $promocion->Descuento);
            $sentencia->bindParam(':IDEmpresa', $promocion->IDEmpresa);
            $sentencia->bindParam(':IDCupon', $promocion->IDCupon);
            $sentencia->bindParam(':Habilitado', $promocion->Habilitado, PDO::PARAM_INT);
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

    public function actualizarPromocion(Promocion $promocion) {
        try {
            $this->dbContext->conectar();
            $query = "UPDATE `promocion` SET 
                `FechaDeInicio`= :FechaDeInicio,
                `FechaDeVencimiento`=:FechaDeVencimiento,
                `Descuento`=:Descuento,
                `IDEmpresa`=:IDEmpresa,
                `IDCupon`=:IDCupon,
                `Habilitado`=:Habilitado 
                WHERE `IDPromocion`=:IDPromocion";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':IDPromocion', $promocion->IDPromocion);
            $sentencia->bindParam(':FechaDeInicio', $promocion->FechaDeInicio);
            $sentencia->bindParam(':FechaDeVencimiento', $promocion->FechaDeVencimiento);
            $sentencia->bindParam(':Descuento', $promocion->Descuento);
            $sentencia->bindParam(':IDEmpresa', $promocion->IDEmpresa);
            $sentencia->bindParam(':IDCupon', $promocion->IDCupon);
            $sentencia->bindParam(':Habilitado', $promocion->Habilitado, PDO::PARAM_INT);
            $sentencia->execute();
            $sentencia->closeCursor();
            $this->dbContext->desconectar();
            return true;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            return false;
        }
    }

    public function eliminarPromocion($idPromocion, $estado) {
        try {
            $this->dbContext->conectar();
            $query = "UPDATE `promocion` SET 
                `Habilitado` = :Estado 
                WHERE IDPromocion = :IDPromocion";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':Estado', $estado, PDO::PARAM_INT);
            $sentencia->bindParam(':IDPromocion', $idPromocion, PDO::PARAM_INT);
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
