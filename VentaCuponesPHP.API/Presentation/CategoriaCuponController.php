<?php
require_once '../Business/CategoriaCuponLectura.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

class CategoriaCuponController{
    private $categoariaCuponLectura;

    public function __construct()
    {
        $this->categoariaCuponLectura = new CategoriaCuponLectura();
    }

    public function handleRequest()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['id'])) {
                    $categoria = $this->categoariaCuponLectura->obtenerCategoriaPorId($_GET['id']);
                    if ($categoria) {
                        echo json_encode($categoria);
                    } else {
                        http_response_code(404);
                        echo json_encode(['error' => 'Cupón no encontrado']);
                    }
                } else {
                    $categorias = $this->categoariaCuponLectura->obtenerTodasLasCategorias();
                    echo json_encode($categorias);
                }
                http_response_code(200);
                exit();
            }
            http_response_code(400);
            echo json_encode(['error' => 'Método no permitido']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
        }
    }
}

// Instancia del controlador y manejo de la solicitud
$controller = new CategoriaCuponController();
$controller->handleRequest();
?>
