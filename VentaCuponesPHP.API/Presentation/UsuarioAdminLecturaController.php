<?php

require_once '../Business/UsuarioAdminLectura.php';
require_once '../Model/UsuarioAdmin.php';
require_once '../Model/Empresa.php';
require_once '../Model/Cupon.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

$usuarioAdminLectura = new UsuarioAdminLectura();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            $cupones = $usuarioAdminLectura->obtenerCuponesEmpresa($_GET['id']);
            if ($cupones) {
                echo json_encode($cupones);
                header("HTTP/1.1 200 OK");
            } else {
                header("HTTP/1.1 404 Not Found");
            }
        } else {
            $empresas = $usuarioAdminLectura->obtenerTodasLasEmpresas();
            if ($empresas) {
                echo json_encode($empresas);
                header("HTTP/1.1 200 OK");
            } else {
                header("HTTP/1.1 404 Not Found");
            }
        }
        exit();
    }

    header("HTTP/1.1 400 Bad Request");
    exit();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
    exit();
}
?>
