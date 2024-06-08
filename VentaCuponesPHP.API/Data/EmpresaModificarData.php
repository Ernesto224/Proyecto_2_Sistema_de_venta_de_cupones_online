<?php
<<<<<<< HEAD
$pdo = null;
$host = "localhost:3306";
$user = "root";
$password = "";
$bd = "tarea3_lenguajes_php";

=======
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
require_once "../Model/Empresa.php";

class EmpresaModificarData {
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

    public function registrarEmpresa(Empresa $empresa) {
        try {
<<<<<<< HEAD
            conectar();
=======
            $this->conectar();
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
            $query = "INSERT INTO Empresa (NombreEmpresa, DireccionFisica, CedulaFisicaJuridica, FechaCreacion, CorreoElectronico, Telefono, NombreUsuario, Contrasenia, Habilitado, CredencialesTemporales) 
                      VALUES (:NombreEmpresa, :DireccionFisica, :CedulaFisicaJuridica, :FechaCreacion, :CorreoElectronico, :Telefono, :NombreUsuario, :Contrasenia, :Habilitado, :CredencialesTemporales)";
            $sentencia = $GLOBALS['pdo']->prepare($query);
            $sentencia->bindParam(':NombreEmpresa', $empresa->NombreEmpresa);
            $sentencia->bindParam(':DireccionFisica', $empresa->DireccionFisica);
            $sentencia->bindParam(':CedulaFisicaJuridica', $empresa->CedulaFisicaJuridica);
            $sentencia->bindParam(':FechaCreacion', $empresa->FechaCreacion);
            $sentencia->bindParam(':CorreoElectronico', $empresa->CorreoElectronico);
            $sentencia->bindParam(':Telefono', $empresa->Telefono);
            $sentencia->bindParam(':NombreUsuario', $empresa->NombreUsuario);
            $sentencia->bindParam(':Contrasenia', $empresa->Contrasenia);
            $sentencia->bindParam(':Habilitado', $empresa->Habilitado);
            $sentencia->bindParam(':CredencialesTemporales', $empresa->CredencialesTemporales);
            $sentencia->execute();
            $idAutoIncrement = $GLOBALS['pdo']->lastInsertId();
            $sentencia->closeCursor();
            $this->desconectar();
            return $idAutoIncrement;
        } catch (Exception $e) {
            throw new Exception("Error al registrar la empresa: " . $e->getMessage());
        }
    }
    
    public function actualizarEmpresa(Empresa $empresa) {
        try {
            $this->conectar();
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
            $sentencia = $GLOBALS['pdo']->prepare($query);
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
            $this->desconectar();
            return true;
        } catch (Exception $e) {
            throw new Exception("Error al actualizar la empresa: " . $e->getMessage());
        }
    }
    
    public function eliminarEmpresa($id) {
        try {
            $this->conectar();
            $query = "UPDATE Empresa SET Habilitado = 0 WHERE IDEmpresa = :IDEmpresa";
            $sentencia = $GLOBALS['pdo']->prepare($query);
            $sentencia->bindParam(':IDEmpresa', $id, PDO::PARAM_INT);
            $sentencia->execute();
            $sentencia->closeCursor();
            $this->desconectar();
            return true;
        } catch (Exception $e) {
            $this->desconectar();
            die("Error: " . $e->getMessage());
        }
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
