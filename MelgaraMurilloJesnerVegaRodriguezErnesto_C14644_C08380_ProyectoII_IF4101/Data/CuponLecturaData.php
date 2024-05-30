<?php 

$pdo=null;
$host="localhost:3306";
$user="root";
$password="";
$bd="lenguajes";
require_once "../Model/Cupon.php";

function conectar(){
    try{
        $GLOBALS['pdo']=new PDO("mysql:host=".$GLOBALS['host'].";dbname=".$GLOBALS['bd']."", $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        print "Error!: No se pudo conectar a la bd ".$bd."<br/>";
        print "\nError!: ".$e."<br/>";
        die();
    }
}
function desconectar() {
        $GLOBALS['pdo']=null;
}
class CuponLecturaData{

    

    function obtenerCuponPorId($id){
        global $pdo;
        try {
            conectar();
            $query = "SELECT * FROM Cupon WHERE IDCupon = :id";
            $sentencia = $pdo -> prepare($query);
            $sentencia -> bindParam(':id', $id, PDO::PARAM_INT);
            $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
            $sentencia -> execute();
            $resultado = $sentencia->fetch();
            $this->desconectar();
            return $resultado;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    function obtenerTodosLosCupones(){
        global $pdo;
        try {
            conectar();
            $query = "SELECT * FROM Cupon";
            $sentencia = $pdo -> prepare($query);
            $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
            $sentencia -> execute();
            $resultado = $sentencia->fetchAll();
            $this->desconectar();
            return $resultado;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
