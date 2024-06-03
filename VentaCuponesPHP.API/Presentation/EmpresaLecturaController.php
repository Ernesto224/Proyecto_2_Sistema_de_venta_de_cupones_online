<?php
require_once '../Business/EmpresaLectura.php';
require_once '../Model/Empresa.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$empresaLectura = new EmpresaLectura();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            $empresa = $empresaLectura->obtenerEmpresaPorId($_GET['id']);
            if ($empresa) {
                echo json_encode($empresa);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Empresa no encontrada']);
            }
        } else {
            $empresas = $empresaLectura->obtenerTodasLasEmpresas();
            echo json_encode($empresas);
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
