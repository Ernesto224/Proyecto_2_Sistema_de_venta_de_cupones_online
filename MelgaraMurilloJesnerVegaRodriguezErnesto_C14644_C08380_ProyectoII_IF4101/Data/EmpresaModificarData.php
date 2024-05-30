<?php
$pdo = null;
$host = "localhost:3306";
$user = "root";
$password = "";
$bd = "lenguajes";

require_once "../Model/Empresa.php";

function conectar() {
    try {
        $GLOBALS['pdo'] = new PDO("mysql:host=" .$GLOBALS['host'] . ";dbname=" . $GLOBALS['bd'], $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Error!: No se pudo conectar a la bd " . $GLOBALS['bd'] . "<br/>";
        print "\nError!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function desconectar() {
    $GLOBALS['pdo'] = null;
}

class EmpresaModificarData {
    public function registrarEmpresa(Empresa $empresa) {
        try {
            conectar();
            $query = "INSERT INTO Empresa (NombreEmpresa, DireccionFisica, CedulaFisicaJuridica, FechaCreacion, CorreoElectronico, Telefono, Contrasenia, Habilitado) 
                      VALUES (:NombreEmpresa, :DireccionFisica, :CedulaFisicaJuridica, :FechaCreacion, :CorreoElectronico, :Telefono, :Contrasenia, :Habilitado)";
            $sentencia = $GLOBALS['pdo']->prepare($query);
            $sentencia->bindParam(':NombreEmpresa', $empresa->NombreEmpresa);
            $sentencia->bindParam(':DireccionFisica', $empresa->DireccionFisica);
            $sentencia->bindParam(':CedulaFisicaJuridica', $empresa->CedulaFisicaJuridica);
            $sentencia->bindParam(':FechaCreacion', $empresa->FechaCreacion);
            $sentencia->bindParam(':CorreoElectronico', $empresa->CorreoElectronico);
            $sentencia->bindParam(':Telefono', $empresa->Telefono);
            $sentencia->bindParam(':Contrasenia', $empresa->Contrasenia);
            $sentencia->bindParam(':Habilitado', $empresa->Habilitado);
            $sentencia->execute();
            $idAutoIncrement = $GLOBALS['pdo']->lastInsertId();
            $sentencia->closeCursor();
            desconectar();
            return $idAutoIncrement;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function actualizarEmpresa(Empresa $empresa) {
        try {
            conectar();
            $query = "UPDATE Empresa SET 
                      NombreEmpresa = :NombreEmpresa, 
                      DireccionFisica = :DireccionFisica, 
                      CedulaFisicaJuridica = :CedulaFisicaJuridica, 
                      FechaCreacion = :FechaCreacion, 
                      CorreoElectronico = :CorreoElectronico, 
                      Telefono = :Telefono, 
                      Contrasenia = :Contrasenia, 
                      Habilitado = :Habilitado 
                      WHERE IDEmpresa = :IDEmpresa";
            $sentencia = $GLOBALS['pdo']->prepare($query);
            $sentencia->bindParam(':NombreEmpresa', $empresa->NombreEmpresa);
            $sentencia->bindParam(':DireccionFisica', $empresa->DireccionFisica);
            $sentencia->bindParam(':CedulaFisicaJuridica', $empresa->CedulaFisicaJuridica);
            $sentencia->bindParam(':FechaCreacion', $empresa->FechaCreacion);
            $sentencia->bindParam(':CorreoElectronico', $empresa->CorreoElectronico);
            $sentencia->bindParam(':Telefono', $empresa->Telefono);
            $sentencia->bindParam(':Contrasenia', $empresa->Contrasenia);
            $sentencia->bindParam(':Habilitado', $empresa->Habilitado);
            $sentencia->bindParam(':IDEmpresa', $empresa->IDEmpresa);
            $sentencia->execute();
            $sentencia->closeCursor();
            desconectar();
            return true;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function eliminarEmpresa($id) {
        try {
            conectar();
            $query = "DELETE FROM Empresa WHERE IDEmpresa = :IDEmpresa";
            $sentencia = $GLOBALS['pdo']->prepare($query);
            $sentencia->bindParam(':IDEmpresa', $id, PDO::PARAM_INT);
            $sentencia->execute();
            $sentencia->closeCursor();
            desconectar();
            return true;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
