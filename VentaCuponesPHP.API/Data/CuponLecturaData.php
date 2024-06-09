<?php
require_once "../Data/ContextoDeBaseDeDatos.php";
require_once "../Model/Cupon.php";

class CuponLecturaData {
    private $dbContext;

    public function __construct() {
        $this->dbContext = new ContextoDeBaseDeDatos();
    }

    function obtenerCuponPorId($id) {
        try {
            $this->dbContext->conectar();
            $query = "SELECT 
                `cupon`.`IDCupon`, 
                `cupon`.`Nombre`, 
                `cupon`.`Imagen`, 
                `cupon`.`Ubicacion`, 
                `cupon`.`PrecioCupon`, 
                `cupon`.`IDEmpresa`, 
                `cupon`.`IDCategoria`,
                `cupon`.`Habilitado`
                FROM `cupon`
                WHERE IDCupon = :id";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            $this->dbContext->desconectar();
            if (!$resultado) {
                throw new Exception("Cupón no encontrado");
            }
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }

    function obtenerTodosLosCupones($categoria, $termino, $pagina) {
        try {
            $this->dbContext->conectar();
    
            // Calcular el inicio y el máximo para la paginación
            $maximo = 5;
            $inicio = ($pagina - 1) * $maximo;
    
            // Consulta al procedimiento almacenado
            $query = "call tarea3_lenguajes_php.BuscarCupones(:Categoria, :Termino, :Inicio, :Maximo)";
            $sentencia = $this->dbContext->prepararSentencia($query);
            $sentencia->bindParam(':Categoria', $categoria, PDO::PARAM_INT);
            $sentencia->bindParam(':Termino', $termino, PDO::PARAM_STR);
            $sentencia->bindParam(':Inicio', $inicio, PDO::PARAM_INT);
            $sentencia->bindParam(':Maximo', $maximo, PDO::PARAM_INT);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
    
            $resultado = $sentencia->fetchAll();
            $this->dbContext->desconectar();
    
            if (!$resultado) {
                throw new Exception("No se encontraron cupones");
            }
    
            return $resultado;
        } catch (Exception $e) {
            $this->dbContext->desconectar();
            echo json_encode(['error' => "Error: " . $e->getMessage()]);
            die();
        }
    }
}
?>
