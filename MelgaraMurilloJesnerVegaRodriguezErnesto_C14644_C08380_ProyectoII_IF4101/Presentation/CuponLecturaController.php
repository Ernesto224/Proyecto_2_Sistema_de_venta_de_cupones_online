<?php

require_once '../Business/CuponLectura.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

class CuponLecturaController
{
    private $cuponLectura;

    public function __construct()
    {
        $this->cuponLectura = new CuponLectura();
    }

    public function handleRequest()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['id'])) {
                    $cupon = $this->cuponLectura->obtenerCuponPorId($_GET['id']);
                    if ($cupon) {
                        echo json_encode($cupon);
                    } else {
                        http_response_code(404);
                        echo json_encode(['error' => 'Cupón no encontrado']);
                    }
                } else {
                    $cupones = $this->cuponLectura->obtenerTodosLosCupones();
                    echo json_encode($cupones);
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
$controller = new CuponLecturaController();
$controller->handleRequest();
?>
