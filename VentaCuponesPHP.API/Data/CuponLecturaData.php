<?php

$pdo = null;
$host = "localhost:3307";
$user = "root";
$password = "";
$bd = "phpmyadmin";
require_once "../Model/Cupon.php";

function conectar() {
    try {
        $GLOBALS['pdo'] = new PDO("mysql:host=" . $GLOBALS['host'] . ";dbname=" . $GLOBALS['bd'], $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo json_encode(['error' => "Error!: No se pudo conectar a la bd " . $GLOBALS['bd'] . " - " . $e->getMessage()]);
        die();
    }
}

function desconectar() {
    $GLOBALS['pdo'] = null;
}

class CuponLecturaData {
    function obtenerCuponPorId($id) {
        global $pdo;
        try {
            conectar();
            $query = "SELECT * FROM Cupon WHERE IDCupon = :id";
            $sentencia = $pdo->prepare($query);
            $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            desconectar();
            if (!$resultado) {
                throw new Exception("Cupón no encontrado");
            }
            return $resultado;
        } catch (Exception $e) {
            desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }

    function obtenerTodosLosCupones() {
        global $pdo;
        try {
            conectar();
            $query = "SELECT * FROM Cupon";
            $sentencia = $pdo->prepare($query);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            desconectar();
            if (!$resultado) {
                throw new Exception("No se encontraron cupones");
            }
            return $resultado;
        } catch (Exception $e) {
            desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }
}
?>
