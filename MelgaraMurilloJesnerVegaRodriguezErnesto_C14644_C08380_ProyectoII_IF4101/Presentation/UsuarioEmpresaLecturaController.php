<?php

require_once '../Business/UsuarioEmpresaLectura.php';
require_once '../Model/UsuarioEmpresa.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Manejar las solicitudes OPTIONS (Preflight request)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

$usuarioEmpresaLectura = new UsuarioEmpresaLectura();

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['nombreUsuario']) && isset($_POST['contrasenia'])) {
            $nombreUsuario = $_POST['nombreUsuario'];
            $contrasenia = $_POST['contrasenia'];

            $resultado = $usuarioEmpresaLectura->verificarInicioSesion($nombreUsuario, $contrasenia);

            if ($resultado) {
                echo json_encode($resultado);
                http_response_code(200);
            } else {
                echo json_encode(['error' => 'Credenciales inválidas']);
                http_response_code(404);
            }
        } else {
            echo json_encode(['error' => 'Faltan datos de inicio de sesión']);
            http_response_code(400);
        }
    } else {
        echo json_encode(['error' => 'Método no permitido']);
        http_response_code(405);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
    exit();
}
?>
