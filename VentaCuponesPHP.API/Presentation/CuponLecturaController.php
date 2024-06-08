<?php
require_once '../Business/CuponLectura.php';
require_once '../Model/CategoriaCupon.php';

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
<<<<<<< HEAD

=======
    
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
    http_response_code(400);
    echo json_encode(['error' => 'Método no permitido']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
