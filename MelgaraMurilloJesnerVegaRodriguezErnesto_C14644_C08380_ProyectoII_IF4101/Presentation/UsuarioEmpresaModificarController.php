<?php

require_once '../Business/UsuarioEmpresaModificar.php';
require_once '../Model/UsuarioEmpresa.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Manejar las solicitudes OPTIONS (Preflight request)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

$usuarioEmpresaModificar = new UsuarioEmpresaModificar();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['METHOD']) && $_POST['METHOD'] == 'PUT') {
        unset($_POST['METHOD']);
        
        if (isset($_POST['nuevaContrasenia']) && isset($_GET['idUsuario'])) {
            $nuevaContrasenia = $_POST['nuevaContrasenia'];
            $idUsuario = $_GET['idUsuario'];

            $cambioExitoso = $usuarioEmpresaModificar->cambiarContrasenia($nuevaContrasenia, $idUsuario);

            if ($cambioExitoso) {
                echo json_encode(['message' => 'Contraseña cambiada con éxito']);
                header("HTTP/1.1 200 OK");
            } else {
                echo json_encode(['message' => 'Error al cambiar la contraseña']);
                header("HTTP/1.1 500 Internal Server Error");
            }
        } else {
            echo json_encode(['message' => 'Faltan datos para cambiar la contraseña']);
            header("HTTP/1.1 400 Bad Request");
        }
    } else {
        echo json_encode(['message' => 'Método no permitido']);
        header("HTTP/1.1 405 Method Not Allowed");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
    exit();
}
?>
