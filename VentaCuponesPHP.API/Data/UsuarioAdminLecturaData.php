<?php
require_once "../Model/UsuarioAdmin.php";

class UsuarioAdminLecturaData{
    private $pdo;
    private $host = "localhost:3307";
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
    
    public function verificarInicioSesion($NombreUsuario, $Contrasenia){
        try {
            $query = "SELECT 1 FROM UsuarioAdmin WHERE NombreUsuario = :NombreUsuario and Contrasenia = :Contrasenia";
            $sentencia = $this->pdo->prepare($query); 
            $sentencia->bindParam(':NombreUsuario', $NombreUsuario);
            $sentencia->bindParam(':Contrasenia', $Contrasenia);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC); 
            $sentencia->closeCursor();
            if($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
