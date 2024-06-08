<?php
require_once "../Business/UsuarioAdminLectura.php";
require_once "../Model/UsuarioAdmin.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$usuarioAdminLectura = new UsuarioAdminLectura();

try {

    if($_POST['METHOD']=='POST'){
        unset($_POST['METHOD']);
        try {
            $resultado = $usuarioAdminLectura->verificarInicioSesion($_POST['NombreUsuario'], $_POST['Contrasenia']);
            echo json_encode($resultado);
            http_response_code(200);
        } catch (Exception $e) {
            echo json_encode('Error');
            http_response_code(400);
        }
        exit();
    }

    http_response_code(400);
    echo json_encode(['error' => 'Método no permitido']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
}
?>