<?php

require_once "../Model/Cupon.php";

class CuponModificarData {
    private $pdo;
    
    public function __construct() {
        $this->pdo = null;
        $this->host = "localhost:3306";
        $this->user = "root";
        $this->password = "";
        $this->bd = "phpmyadmin";
    }

    private function conectar() {
        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->bd, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Error!: No se pudo conectar a la bd " . $this->bd . "<br/>";
            print "\nError!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    private function desconectar() {
        $this->pdo = null;
    }

    public function registrarCupon(Cupon $cupon) {
        try {
            $this->conectar();
            $query = "INSERT INTO Cupon(Nombre, Imagen, Ubicacion, PrecioCuponBase, PrecioCuponVenta, FechaVencimientoOferta, IDEmpresa, IDCategoria, Habilitado, EnPromocion)
                      VALUES(:Nombre, :Imagen, :Ubicacion, :PrecioCuponBase, :PrecioCuponVenta, :FechaVencimientoOferta, :IDEmpresa, :IDCategoria, :Habilitado, :EnPromocion)";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(':Nombre', $cupon->Nombre);
            $sentencia->bindParam(':Imagen', $cupon->Imagen);
            $sentencia->bindParam(':Ubicacion', $cupon->Ubicacion);
            $sentencia->bindParam(':PrecioCuponBase', $cupon->PrecioCuponBase);
            $sentencia->bindParam(':PrecioCuponVenta', $cupon->PrecioCuponVenta);
            $sentencia->bindParam(':FechaVencimientoOferta', $cupon->FechaVencimientoOferta);
            $sentencia->bindParam(':IDEmpresa', $cupon->IDEmpresa);
            $sentencia->bindParam(':IDCategoria', $cupon->IDCategoria);
            $sentencia->bindParam(':Habilitado', $cupon->Habilitado);
            $sentencia->bindParam(':EnPromocion', $cupon->EnPromocion);  // <-- Punto y coma añadido aquí
            $sentencia->execute();
            $idAutoIncrement = $this->pdo->lastInsertId();
            $sentencia->closeCursor();
            $this->desconectar();
            return $idAutoIncrement;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function actualizarCupon(Cupon $cupon) {
        try {
            $this->conectar();
            $query = "UPDATE Cupon SET 
                      Nombre = :Nombre, 
                      Imagen = :Imagen, 
                      Ubicacion = :Ubicacion, 
                      PrecioCuponBase = :PrecioCuponBase, 
                      PrecioCuponVenta = :PrecioCuponVenta, 
                      FechaVencimientoOferta = :FechaVencimientoOferta, 
                      IDEmpresa = :IDEmpresa, 
                      Habilitado = :Habilitado,
                      EnPromocion = :EnPromocion
                      WHERE IDCupon = :IDCupon";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(':Nombre', $cupon->Nombre);
            $sentencia->bindParam(':Imagen', $cupon->Imagen);
            $sentencia->bindParam(':Ubicacion', $cupon->Ubicacion);
            $sentencia->bindParam(':PrecioCuponBase', $cupon->PrecioCuponBase);
            $sentencia->bindParam(':PrecioCuponVenta', $cupon->PrecioCuponVenta);
            $sentencia->bindParam(':FechaVencimientoOferta', $cupon->FechaVencimientoOferta);
            $sentencia->bindParam(':IDEmpresa', $cupon->IDEmpresa);
            $sentencia->bindParam(':Habilitado', $cupon->Habilitado);
            $sentencia->bindParam(':IDCupon', $cupon->IDCupon);
            $sentencia->bindParam(':EnPromocion', $cupon->EnPromocion);  // <-- Punto y coma añadido aquí
            $sentencia->execute();
            $sentencia->closeCursor();
            $this->desconectar();
            return true;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function eliminarCupon($id) {
        try {
            $this->conectar();
            $query = "DELETE FROM Cupon WHERE IDCupon = :IDCupon";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(':IDCupon', $id, PDO::PARAM_INT);
            $sentencia->execute();
            $sentencia->closeCursor();
            $this->desconectar();
            return true;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>
