<?php
require_once '../Business/CategoriaCuponLectura.php';
require_once '../Model/CategoriaCupon.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$categoariaCuponLectura = new CategoriaCuponLectura();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            $categoria = $categoariaCuponLectura->obtenerCategoriaPorId($_GET['id']);
            if ($categoria) {
                echo json_encode($categoria);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Cupón no encontrado']);
            }
        } else {
            $categorias = $categoariaCuponLectura->obtenerTodasLasCategorias();
            echo json_encode($categorias);
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
