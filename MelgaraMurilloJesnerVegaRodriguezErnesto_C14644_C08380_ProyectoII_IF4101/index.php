<?php

// Definir la ubicación de los archivos de controlador
$controllerPath = __DIR__ . '/Presentation/';

// Obtener la ruta de la solicitud actual
$requestUri = $_SERVER['REQUEST_URI'];

// Obtener el método de la solicitud actual
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Eliminar la parte de la URL después del nombre de archivo (si existe)
$requestUri = strtok($requestUri, '?');

// Determinar el controlador y la acción en función de la URL y el método de solicitud
switch ($requestUri) {
    case '/cupon':
        require_once $controllerPath . 'CuponLecturaController.php';
        $cuponLecturaController = new CuponLecturaController();
        $cuponLecturaController->handleRequest();
        break;
    case '/cupon/modificar':
        require_once $controllerPath . 'CuponModificarController.php';
        $cuponModificarController = new CuponModificarController();
        $cuponModificarController->handleRequest();
        break;
    case '/empresa':
        require_once $controllerPath . 'EmpresaLecturaController.php';
        $empresaLecturaController = new EmpresaLecturaController();
        $empresaLecturaController->handleRequest();
        break;
    case '/empresa/modificar':
        require_once $controllerPath . 'EmpresaModificarController.php';
        $empresaModificarController = new EmpresaModificarController();
        $empresaModificarController->handleRequest();
        break;
    case '/usuario/admin':
        require_once $controllerPath . 'UsuarioAdminLecturaController.php';
        $usuarioAdminLecturaController = new UsuarioAdminLecturaController();
        $usuarioAdminLecturaController->handleRequest();
        break;
    case '/usuario/admin/modificar':
        require_once $controllerPath . 'UsuarioAdminModificarController.php';
        $usuarioAdminModificarController = new UsuarioAdminModificarController();
        $usuarioAdminModificarController->handleRequest();
        break;
    case '/usuario/empresa':
        require_once $controllerPath . 'UsuarioEmpresaLecturaController.php';
        $usuarioEmpresaLecturaController = new UsuarioEmpresaLecturaController();
        $usuarioEmpresaLecturaController->handleRequest();
        break;
    case '/usuario/empresa/modificar':
        require_once $controllerPath . 'UsuarioEmpresaModificarController.php';
        $usuarioEmpresaModificarController = new UsuarioEmpresaModificarController();
        $usuarioEmpresaModificarController->handleRequest();
        break;
    default:
        // Si la ruta no coincide con ninguna de las anteriores, devolver un error 404
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint no encontrado']);
        break;
}
?>
