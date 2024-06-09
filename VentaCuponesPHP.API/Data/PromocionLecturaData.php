<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/Promocion.php";

class PromocionLecturaData{
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }

    function obtenerTodasLasPromocionesPorEmpresa($idEmpresa) {
        try {
            $this->dbContext->conectar();
            $query = "SELECT 
                `IDPromocion`, 
                `FechaDeInicio`, 
                `FechaDeVencimiento`, 
                `Descuento`, 
                `IDEmpresa`, 
                `IDCupon`, 
                `Habilitado` 
                FROM `promocion` 
                WHERE IDEmpresa = :idEmpresa";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':idEmpresa', $idEmpresa, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $this->dbContext->desconectar();
            if (!$resultado) {
                throw new Exception("No se encontraron promociones");
            }
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }
}
?>