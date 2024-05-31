<?php
require_once "../Model/UsuarioEmpresa.php";
require_once "../Model/UsuarioAdmin.php";

class UsuarioEmpresaLecturaData {
    private $pdo;
    private $host = "localhost:3306";
    private $user = "root";
    private $password = "";
    private $bd = "phpmyadmin";

    public function conectar() {
        try {
            $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->bd, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Error!: No se pudo conectar a la bd ".$this->bd."<br/>";
            print "\nError!: ".$e."<br/>";
            die();
        }
    }

    public function desconectar() {
        $this->pdo = null;
    }

    public function verificarInicioSesion($nombreUsuario, $contrasenia) {
        try {
            $this->conectar();
            $query = "SELECT * FROM UsuarioEmpresa WHERE NombreUsuario = :nombreUsuario AND Contrasenia = :contrasenia";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(':nombreUsuario', $nombreUsuario, PDO::PARAM_STR);
            $sentencia->bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            $this->desconectar();
            return $resultado;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>
