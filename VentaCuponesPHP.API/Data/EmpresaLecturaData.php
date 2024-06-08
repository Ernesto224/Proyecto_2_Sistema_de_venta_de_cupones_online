<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/Empresa.php";

class EmpresaLecturaData {
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }

    public function obtenerEmpresaPorId($id): ?array {
        try {
            $this->dbContext->conectar();
            $query = "SELECT 
                `IDEmpresa`, 
                `NombreEmpresa`, 
                `DireccionFisica`, 
                `CedulaFisicaJuridica`, 
                `FechaCreacion`, 
                `CorreoElectronico`, 
                `Telefono`, 
                `NombreUsuario`, 
                `Contrasenia`, 
                `Habilitado`, 
                `CredencialesTemporales` 
                FROM `empresa`
                WHERE IDEmpresa = :id";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            $this->dbContext->desconectar();
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }

    public function obtenerTodasLasEmpresas(): ?array {
        try {
            $this->dbContext->conectar();
            $query = "SELECT 
                `IDEmpresa`, 
                `NombreEmpresa`, 
                `DireccionFisica`, 
                `CedulaFisicaJuridica`, 
                `FechaCreacion`, 
                `CorreoElectronico`, 
                `Telefono`, 
                `NombreUsuario`, 
                `Contrasenia`, 
                `Habilitado`, 
                `CredencialesTemporales` 
                FROM `empresa`";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $this->dbContext->desconectar();
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }

    public function verificarInicioSesion($NombreUsuario, $Contrasenia) {
        try {
            $this->dbContext->conectar();
            $query = "SELECT * FROM Empresa WHERE NombreUsuario = :NombreUsuario AND Contrasenia = :Contrasenia";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':NombreUsuario', $NombreUsuario);
            $sentencia->bindParam(':Contrasenia', $Contrasenia);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            $this->dbContext->desconectar();
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            return null;
            die();
        }
    }
    
    
    public function obtenerCuponesEmpresa($IdEmpresa): ?array {
        try {
            $this->dbContext->conectar();
            $query = "SELECT 
                `IDCupon`, 
                `Nombre`, 
                `Imagen`, 
                `Ubicacion`, 
                `PrecioCupon`, 
                `IDEmpresa`, 
                `IDCategoria`, 
                `Habilitado` 
                FROM `cupon` 
                WHERE IDEmpresa = :IdEmpresa";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':IdEmpresa', $IdEmpresa, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $this->dbContext->desconectar();
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }
    
    public function obtenerPromocionesEmpresa($IdEmpresaPromocion): ?array {
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
                WHERE IDEmpresa = :IdEmpresaPromocion";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':IdEmpresaPromocion', $IdEmpresaPromocion, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $this->dbContext->desconectar();
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }
}
?>
