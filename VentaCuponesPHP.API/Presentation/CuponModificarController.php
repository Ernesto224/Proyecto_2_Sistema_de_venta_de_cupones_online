<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once "../Business/CuponModificar.php";
require_once "../Model/Cupon.php";

$cuponModificar = new CuponModificar();

// Manejo de solicitudes OPTIONS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Max-Age: 86400');
    header("HTTP/1.1 200 OK");
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

switch ($data['METHOD']) {
    case 'POST':
        $cupon = new Cupon(
            null,
            $data['Nombre'],
            $data['Imagen'],
            $data['Ubicacion'],
            $data['PrecioCupon'],
            $data['IDEmpresa'],
            $data['IDCategoria'],
            $data['Habilitado']
        );
        $id = $cuponModificar->registrarCupon($cupon);
        echo json_encode(['IDCupon' => $id]);
        break;

    case 'PUT':
        $cupon = new Cupon(
            $data['IDCupon'],
            $data['Nombre'],
            $data['Imagen'],
            $data['Ubicacion'],
            $data['PrecioCupon'],
            $data['IDEmpresa'],
            $data['IDCategoria'],
            $data['Habilitado']
        );
        $cuponModificar->actualizarCupon($cupon);
        echo json_encode(['message' => 'Cupon actualizado']);
        break;

    case 'DELETE':
        $cuponModificar->eliminarCupon($data['IDCupon']);
        echo json_encode(['message' => 'Cupon eliminado']);
        break;

    default:
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(['message' => 'Invalid METHOD']);
        break;
}

?>
