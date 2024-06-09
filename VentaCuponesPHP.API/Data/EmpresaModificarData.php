<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/Empresa.php";

class EmpresaModificarData {
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }

    public function registrarEmpresa(Empresa $empresa) {
        try {
            $this->dbContext->conectar();
            $query = "INSERT INTO Empresa 
                (NombreEmpresa, 
                DireccionFisica, 
                CedulaFisicaJuridica, 
                FechaCreacion, 
                CorreoElectronico, 
                Telefono, 
                NombreUsuario, 
                Contrasenia, 
                Habilitado, 
                CredencialesTemporales) 
                VALUES (:NombreEmpresa, 
                :DireccionFisica, 
                :CedulaFisicaJuridica, 
                :FechaCreacion, 
                :CorreoElectronico, 
                :Telefono, 
                :NombreUsuario, 
                :Contrasenia, 
                :Habilitado, 
                :CredencialesTemporales)";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':NombreEmpresa', $empresa->NombreEmpresa);
            $sentencia->bindParam(':DireccionFisica', $empresa->DireccionFisica);
            $sentencia->bindParam(':CedulaFisicaJuridica', $empresa->CedulaFisicaJuridica);
            $sentencia->bindParam(':FechaCreacion', $empresa->FechaCreacion);
            $sentencia->bindParam(':CorreoElectronico', $empresa->CorreoElectronico);
            $sentencia->bindParam(':Telefono', $empresa->Telefono);
            $sentencia->bindParam(':NombreUsuario', $empresa->NombreUsuario);
            $sentencia->bindParam(':Contrasenia', $empresa->Contrasenia);
            $sentencia->bindParam(':Habilitado', $empresa->Habilitado, PDO::PARAM_INT);
            $sentencia->bindParam(':CredencialesTemporales', $empresa->CredencialesTemporales,PDO::PARAM_INT);
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
    
    public function actualizarEmpresa(Empresa $empresa) {
        try {
            $this->dbContext->conectar();
            $query = "UPDATE Empresa SET 
                NombreEmpresa = :NombreEmpresa, 
                DireccionFisica = :DireccionFisica, 
                CedulaFisicaJuridica = :CedulaFisicaJuridica, 
                FechaCreacion = :FechaCreacion, 
                CorreoElectronico = :CorreoElectronico, 
                Telefono = :Telefono,
                NombreUsuario = :NombreUsuario,
                Contrasenia = :Contrasenia, 
                Habilitado = :Habilitado,
                CredencialesTemporales = :CredencialesTemporales
                WHERE IDEmpresa = :IDEmpresa";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':NombreEmpresa', $empresa->NombreEmpresa);
            $sentencia->bindParam(':DireccionFisica', $empresa->DireccionFisica);
            $sentencia->bindParam(':CedulaFisicaJuridica', $empresa->CedulaFisicaJuridica);
            $sentencia->bindParam(':FechaCreacion', $empresa->FechaCreacion);
            $sentencia->bindParam(':CorreoElectronico', $empresa->CorreoElectronico);
            $sentencia->bindParam(':Telefono', $empresa->Telefono);
            $sentencia->bindParam(':NombreUsuario', $empresa->NombreUsuario);
            $sentencia->bindParam(':Contrasenia', $empresa->Contrasenia);
            $sentencia->bindParam(':Habilitado', $empresa->Habilitado);
            $sentencia->bindParam(':IDEmpresa', $empresa->IDEmpresa);
            $sentencia->bindParam(':CredencialesTemporales', $empresa->CredencialesTemporales);
            $sentencia->execute();
            $sentencia->closeCursor();
            $this->dbContext->desconectar();
            return true;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            return false;
        }
    }

    public function crearCredencialesTemporales(Empresa $empresa) {
        try {
            $this->dbContext->conectar();
            $query = "UPDATE Empresa SET 
                NombreUsuario = :NombreUsuario,
                Contrasenia = :Contrasenia, 
                CredencialesTemporales = :CredencialesTemporales
                WHERE IDEmpresa = :IDEmpresa";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':NombreUsuario', $empresa->NombreUsuario);
            $sentencia->bindParam(':Contrasenia', $empresa->Contrasenia);
            $sentencia->bindParam(':IDEmpresa', $empresa->IDEmpresa);
            $sentencia->bindParam(':CredencialesTemporales', $empresa->CredencialesTemporales);
            $sentencia->execute();
            $sentencia->closeCursor();
            $this->dbContext->desconectar();
            return true;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            return false;
        }
    }

    public function habilitarInabilitarEmpresa($idEmpresa, $estado) {
        try {
            $this->dbContext->conectar();
            $query = "UPDATE Empresa SET 
                Habilitado = :Estado 
                WHERE IDEmpresa = :IDEmpresa";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':Estado', $estado, PDO::PARAM_INT);
            $sentencia->bindParam(':IDEmpresa', $idEmpresa, PDO::PARAM_INT);
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
