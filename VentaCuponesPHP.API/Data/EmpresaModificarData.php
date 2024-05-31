<?php
$pdo = null;
$host = "localhost:3306";
$user = "root";
$password = "";
$bd = "tarea3_lenguajes_php";

require_once "../Model/Empresa.php";

function conectar() {
    try {
        $GLOBALS['pdo'] = new PDO("mysql:host=" . $GLOBALS['host'] . ";dbname=" . $GLOBALS['bd'], $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new Exception("Error!: No se pudo conectar a la bd " . $GLOBALS['bd'] . "\nError!: " . $e->getMessage());
    }
}

function desconectar() {
    $GLOBALS['pdo'] = null;
}

class EmpresaModificarData {
    public function registrarEmpresa(Empresa $empresa) {
        try {
            conectar();
            $query = "INSERT INTO Empresa (NombreEmpresa, 
                                DireccionFisica, 
                                CedulaFisicaJuridica, 
                                FechaCreacion, 
                                CorreoElectronico, 
                                Telefono, 
                                Contrasenia, 
                                Habilitado,
                                CredencialesTemporales) 
                        VALUES (:NombreEmpresa, 
                                :DireccionFisica, 
                                :CedulaFisicaJuridica, 
                                :FechaCreacion, 
                                :CorreoElectronico, 
                                :Telefono, 
                                :Contrasenia, 
                                :Habilitado, 
                                :CredencialesTemporales)";
            $sentencia = $GLOBALS['pdo']->prepare($query);
            $sentencia->bindParam(':NombreEmpresa', $empresa->NombreEmpresa);
            $sentencia->bindParam(':DireccionFisica', $empresa->DireccionFisica);
            $sentencia->bindParam(':CedulaFisicaJuridica', $empresa->CedulaFisicaJuridica);
            $sentencia->bindParam(':FechaCreacion', $empresa->FechaCreacion);
            $sentencia->bindParam(':CorreoElectronico', $empresa->CorreoElectronico);
            $sentencia->bindParam(':Telefono', $empresa->Telefono);
            $sentencia->bindParam(':Contrasenia', $empresa->Contrasenia);
            $sentencia->bindParam(':Habilitado', $empresa->Habilitado);
            $sentencia->bindParama(':CredencialesTemporales', $empresa->CredencialesTemporales);
            $sentencia->execute();
            $idAutoIncrement = $GLOBALS['pdo']->lastInsertId();
            $sentencia->closeCursor();
            desconectar();
            return $idAutoIncrement;
        } catch (Exception $e) {
            throw new Exception("Error al registrar la empresa: " . $e->getMessage());
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
            $sentencia->bindParam(':Contrasenia', $empresa->Contrasenia);
            $sentencia->bindParam(':Habilitado', $empresa->Habilitado);
            $sentencia->bindParam(':IDEmpresa', $empresa->IDEmpresa);
            $sentencia->bindParama(':CredencialesTemporales', $empresa->CredencialesTemporales);
            $sentencia->execute();
            $sentencia->closeCursor();
            desconectar();
            return true;
        } catch (Exception $e) {
            throw new Exception("Error al actualizar la empresa: " . $e->getMessage());
        }
    }
    public function eliminarEmpresa($id) {
        try {
            conectar();
            $query = "UPDATE Empresa SET Habilitado = 0 WHERE IDEmpresa = :IDEmpresa";
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