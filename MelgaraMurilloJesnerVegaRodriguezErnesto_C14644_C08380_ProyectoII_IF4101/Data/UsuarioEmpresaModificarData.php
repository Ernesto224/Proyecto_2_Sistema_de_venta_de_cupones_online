<?php
$pdo=null;
$host="localhost:3306";
$user="root";
$password="";
$bd="phpmyadmin";

require_once "../Model/UsuarioEmpresa.php";

function conectar(){
    try{
        // Corregir el nombre de la variable $bd
        $GLOBALS['pdo']=new PDO("mysql:host=".$GLOBALS['host'].";dbname=".$GLOBALS['bd']."", $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        // Usar la variable global $bd en el mensaje de error
        print "Error!: No se pudo conectar a la bd ".$GLOBALS['bd']."<br/>";
        print "\nError!: ".$e."<br/>";
        die();
    }
}
function desconectar() {
        $GLOBALS['pdo']=null;
}
class UsuarioEmpresaModificarData{
    public function cambiarContrasenia($nuevaContrasenia, $idUsuario){
        // Usar la palabra clave global para acceder a la variable $pdo
        global $pdo;
        try {
            // Corregir la sintaxis de la consulta SQL para actualizar la contraseña
            $query = "UPDATE UsuarioEmpresa SET Contrasenia = :nuevaContrasenia WHERE IDUsuarioEmpresa = :idUsuario ";
            $sentencia = $pdo->prepare($query);
            $sentencia->bindParam(':nuevaContrasenia', $nuevaContrasenia, PDO::PARAM_STR); // Cambiar a PDO::PARAM_STR
            $sentencia->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT); // Corregir el nombre del parámetro
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch(); // No es necesario en este caso
            $this->desconectar(); // No es necesario en este caso
            return true;
    
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>
