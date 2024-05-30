<?php

require_once '../Business/UsuarioEmpresaLectura.php';
require_once '../Model/UsuarioEmpresa.php';
header('Access-Control-Allow-Origin: *');

$usuarioEmpresaLectura = new UsuarioEmpresaLectura();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (isset($data['nombreUsuario']) && isset($data['contrasenia'])) {
        $nombreUsuario = $data['nombreUsuario'];
        $contrasenia = $data['contrasenia'];

        $resultado = $usuarioEmpresaLectura->verificarInicioSesion($nombreUsuario, $contrasenia);

        if ($resultado) {
            // Si las credenciales son válidas, devuelve el resultado en formato JSON
            echo json_encode($resultado);
            http_response_code(200);
        } else {
            // Si las credenciales no son válidas, devuelve un mensaje de error y un código de respuesta 404
            echo json_encode(['error' => 'Credenciales inválidas']);
            http_response_code(404);
        }
    } else {
        // Si los datos de inicio de sesión no están completos, devuelve un mensaje de error y un código de respuesta 400
        echo json_encode(['error' => 'Faltan datos de inicio de sesión']);
        http_response_code(400);
    }
} else {
    // Si el método de solicitud no es POST, devuelve un mensaje de error y un código de respuesta 405
    echo json_encode(['error' => 'Método no permitido']);
    http_response_code(405);
}

?>
