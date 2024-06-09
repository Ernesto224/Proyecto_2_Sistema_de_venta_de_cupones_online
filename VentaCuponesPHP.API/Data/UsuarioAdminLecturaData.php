<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/UsuarioAdmin.php";

class UsuarioAdminLecturaData{
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }
    
    public function verificarInicioSesion($NombreUsuario, $Contrasenia){
        try {
            $this->dbContext->conectar();
            $query = "SELECT 1 FROM UsuarioAdmin WHERE NombreUsuario = :NombreUsuario and Contrasenia = :Contrasenia";
            $sentencia = $this->dbContext->prepararSentencia($query); 
            $sentencia->bindParam(':NombreUsuario', $NombreUsuario);
            $sentencia->bindParam(':Contrasenia', $Contrasenia);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC); 
            $sentencia->closeCursor();
            $this->dbContext->desconectar();
            return $resultado? true: false;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }
}
?>
