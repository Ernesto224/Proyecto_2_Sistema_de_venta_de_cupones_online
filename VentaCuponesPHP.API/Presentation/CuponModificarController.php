<?php
require_once "../Business/CuponModificar.php";
require_once "../Model/Cupon.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$cuponModificar = new CuponModificar();

try {

    if ($_POST['METHOD'] == 'POST') {
        unset($_POST['METHOD']);
        $HabilitadoAux = (int) $_POST['Habilitado'];
        try {
            $cupon = new Cupon(
                null,
                $_POST['Nombre'],
                $_POST['Imagen'],
                $_POST['Ubicacion'],
                $_POST['PrecioCupon'],
                $_POST['IDEmpresa'],
                $_POST['IDCategoria'],
                null,
                $HabilitadoAux 
            );
            $id = $cuponModificar->registrarCupon($cupon);
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
            $cupon = new Cupon(
                $_POST['IDCupon'],
                $_POST['Nombre'],
                $_POST['Imagen'],
                $_POST['Ubicacion'],
                $_POST['PrecioCupon'],
                $_POST['IDEmpresa'],
                $_POST['IDCategoria'],
                null,
                $_POST['Habilitado']
            );
            $resultado = $cuponModificar->actualizarCupon($cupon);
            echo json_encode(['message' => $resultado]);
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(['message' => $e->getMessage()]);
        }
        exit();
    }

    if ($_POST['METHOD'] == 'DELETE') {
        unset($_POST['METHOD']);
            $resultado = $cuponModificar->habilitarInabilitar($_POST['IDCupon'], $_POST['Estado']);
            echo json_encode(['message' => $resultado]);
        exit();
    }

    http_response_code(400);
    echo json_encode(['error' => 'Método no permitido']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
}
?>