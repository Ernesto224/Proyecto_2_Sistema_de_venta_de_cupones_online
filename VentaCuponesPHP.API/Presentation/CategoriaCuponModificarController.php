<?php
require_once "../Business/CategoriaCuponModificar.php";
require_once "../Model/CategoriaCupon.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$categoriaCuponModificar = new CategoriaCuponModificar();

try {
    
    if ($_POST['METHOD'] == 'POST') {
        unset($_POST['METHOD']);
        try {
            $categoriaCupon = new CategoriaCupon(
                null,
                $_POST['Nombre'],
                $_POST['Descripcion']
            );
            $id = $categoriaCuponModificar->registrarCategoriaCupon($categoriaCupon);
            echo json_encode(['IDCupon' => $id]);
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(['message' => $e->getMessage()]);
        }
        exit();
    }
    
    if ($_POST['METHOD'] == 'PUT') {
        unset($_POST['METHOD']);
        try {
            $categoriaCupon = new CategoriaCupon(
                $_POST['IDCategoria'],
                $_POST['Nombre'],
                $_POST['Descripcion']
            );
            $resultado = $categoriaCuponModificar->actualizarCategoriaCupon($categoriaCupon);
            echo json_encode(['message' => $resultado]);
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(['message' => $e->getMessage()]);
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
