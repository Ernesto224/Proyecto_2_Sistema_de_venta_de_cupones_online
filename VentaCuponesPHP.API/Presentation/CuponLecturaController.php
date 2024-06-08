<?php
require_once '../Business/CuponLectura.php';
require_once '../Model/Cupon.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$cuponLectura = new CuponLectura();

try {

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            $cupon = $cuponLectura->obtenerCuponPorId($_GET['id']);
            if ($cupon) {
                echo json_encode($cupon);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Cupón no encontrado']);
            }
        } else {
            $cupones = $cuponLectura->obtenerTodosLosCupones();
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
?>
