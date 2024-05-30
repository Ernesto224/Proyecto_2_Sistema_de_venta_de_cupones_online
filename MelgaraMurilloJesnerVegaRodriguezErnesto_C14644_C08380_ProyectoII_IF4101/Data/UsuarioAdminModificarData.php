<?php
$pdo=null;
$host="localhost:3306";
$user="root";
$password="";
$bd="phpmyadmin";

require_once "../Model/UsuarioAdmin.php";

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

class UsuarioAdminModificarData {
    // Método para actualizar la información jurídica de una empresa
    public function actualizarInfoJuridicaEmpresa(Empresa $empresa) {
        global $pdo;
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

    // Método para actualizar la habilitación de un cupón
    public function actualizarHabilitacionCupon(Cupon $cupon) {
        global $pdo;
        try {
            conectar();
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
            $sentencia = $pdo->prepare($query);
            $sentencia->bindParam(':Nombre', $cupon->Nombre);
            $sentencia->bindParam(':Imagen', $cupon->Imagen);
            $sentencia->bindParam(':Ubicacion', $cupon->Ubicacion);
            $sentencia->bindParam(':PrecioCuponBase', $cupon->PrecioCuponBase);
            $sentencia->bindParam(':PrecioCuponVenta', $cupon->PrecioCuponVenta);
            $sentencia->bindParam(':FechaVencimientoOferta', $cupon->FechaVencimientoOferta);
            $sentencia->bindParam(':IDEmpresa', $cupon->IDEmpresa);
            $sentencia->bindParam(':Habilitado', $cupon->Habilitado);
            $sentencia->bindParam(':IDCupon', $cupon->IDCupon);
            $sentencia->bindParam(':EnPromocion', $cupon->EnPromocion);
            $sentencia->execute();
            $sentencia->closeCursor();
            desconectar();
            return true;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Método para insertar datos de inicio de sesión de una empresa
    public function insertarDatosInicioSesionEmpresa($idEmpresa, $nombreUsuario, $contrasenia){
        global $pdo;
        try {
            conectar();
            $query = "UPDATE UsuarioEmpresa SET Contrasenia = :contrasenia, NombreUsuario = :nombreUsuario WHERE IDEmpresa = :idEmpresa";
            $sentencia = $pdo->prepare($query);
            $sentencia->bindParam(':contrasenia', $contrasenia);
            $sentencia->bindParam(':nombreUsuario', $nombreUsuario);
            $sentencia->bindParam(':idEmpresa', $idEmpresa);
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
