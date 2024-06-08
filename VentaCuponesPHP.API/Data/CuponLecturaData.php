<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/Cupon.php";

class CuponLecturaData {
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }

    function obtenerCuponPorId($id) {
        try {
            $this->dbContext->conectar();
            $query = "SELECT 
                `cupon`.`IDCupon`, 
                `cupon`.`Nombre`, 
                `cupon`.`Imagen`, 
                `cupon`.`Ubicacion`, 
                `cupon`.`PrecioCupon`, 
                `cupon`.`IDEmpresa`, 
                `cupon`.`IDCategoria`,
                `cupon`.`Habilitado`
                FROM `cupon`
                WHERE IDCupon = :id";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            $this->dbContext->desconectar();
            if (!$resultado) {
                throw new Exception("Cupón no encontrado");
            }
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }

    function obtenerTodosLosCupones() {
        try {
            $this->dbContext->conectar();
            $query = "SELECT 
                `cupon`.`IDCupon`, 
                `cupon`.`Nombre`, 
                `cupon`.`Imagen`, 
                `cupon`.`Ubicacion`, 
                `cupon`.`PrecioCupon`, 
                `cupon`.`IDEmpresa`, 
                `cupon`.`IDCategoria`, 
                `promocion`.`Descuento`,
                `cupon`.`Habilitado`
                FROM `cupon` 
                LEFT JOIN `promocion` 
                    ON `cupon`.`IDCupon` = `promocion`.`IDCupon`  
                WHERE `cupon`.`Habilitado` = 1";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $this->dbContext->desconectar();
            if (!$resultado) {
                throw new Exception("No se encontraron cupones");
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
