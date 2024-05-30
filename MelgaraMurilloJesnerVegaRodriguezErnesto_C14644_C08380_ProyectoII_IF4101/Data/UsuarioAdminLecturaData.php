<?php
$pdo = null;
$host = "localhost:3306";
$user = "root";
$password = "";
$bd = "Tarea3_Lenguajes_PHP";

require_once "../Model/UsuarioAdmin.php";

function conectar(){
    try{
        $GLOBALS['pdo'] = new PDO("mysql:host=".$GLOBALS['host'].";dbname=".$GLOBALS['bd']."", $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        print "Error!: No se pudo conectar a la bd ".$GLOBALS['bd']."<br/>";
        print "\nError!: ".$e."<br/>";
        die();
    }
}

function desconectar() {
    $GLOBALS['pdo'] = null;
}

class UsuarioAdminLecturaData{
    public function obtenerTodasLasEmpresas(): ?array {
        try {
            conectar();
            $query = "SELECT * FROM Empresa";
            $sentencia = $GLOBALS['pdo']->prepare($query);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            desconectar();
            return $resultado;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
            return null;
        }
    }

    public function obtenerCuponesEmpresa($idEmpresa) {
        try {
            conectar();
            $query = "SELECT * FROM Cupon WHERE IDEmpresa = :idEmpresa";
            $sentencia = $GLOBALS['pdo']->prepare($query);
            $sentencia->bindParam(':idEmpresa', $idEmpresa, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            desconectar();
            return $resultado;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
