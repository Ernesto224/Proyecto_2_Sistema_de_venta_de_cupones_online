<?php
require_once '../Business/CuponLectura.php';
require_once '../Model/Cupon.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$cuponLectura = new CuponLectura();

try {

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            // Si se proporciona un ID, obtener el cupón por ID
            $cupon = $cuponLectura->obtenerCuponPorId($_GET['id']);
            if ($cupon) {
                echo json_encode($cupon);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Cupón no encontrado']);
            }
        } else {
            // Parámetros de búsqueda y paginación
            $categoria = intval($_GET['categoria']);
            $termino = $_GET['termino'];
            $pagina = intval($_GET['pagina']);
            
            // Obtener todos los cupones con los parámetros
            $cupones = $cuponLectura->obtenerTodosLosCupones($categoria, $termino, $pagina);
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
