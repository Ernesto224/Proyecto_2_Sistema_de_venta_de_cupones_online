<?php
require_once '../Business/PromocionLectura.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

class PromocionLecturaController{
    private $promocionLectura;

    public function __construct()
    {
        $this->promocionLectura = new PromocionLectura();
    }

    public function handleRequest()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['id'])) {
                    $promociones = $this->promocionLectura->obtenerTodasLasPromocionesPorEmpresa($_GET['id']);
                    if ($promociones) {
                        echo json_encode($promociones);
                    } else {
                        http_response_code(404);
                        echo json_encode(['error' => 'Cupón no encontrado']);
                    }
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
$controller = new PromocionLecturaController();
$controller->handleRequest();
?>
