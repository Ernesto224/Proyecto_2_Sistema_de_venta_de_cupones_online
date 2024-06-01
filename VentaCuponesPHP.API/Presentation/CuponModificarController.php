<?php
require_once "../Business/CuponModificar.php";
require_once "../Model/Cupon.php";

header('Access-Control-Allow-Origin: *');
$cuponModificar = new CuponModificar();

if ($_POST['METHOD'] == 'POST') {
    unset($_POST['METHOD']);
    try {
        $cupon = new Cupon(
            null,
            $_POST['Nombre'],
            $_POST['Imagen'],
            $_POST['Ubicacion'],
            $_POST['PrecioCupon'],
            $_POST['IDEmpresa'],
            $_POST['IDCategoria'],
            $_POST['Habilitado']
        );
        $id = $cuponModificar->registrarCupon($cupon);
        echo json_encode(['IDCupon' => $id]);
    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(['message' => $e->getMessage()]);
    }
    exit();
}

// Manejo de solicitudes PUT
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
            $_POST['Habilitado']
        );
        $cuponModificar->actualizarCupon($cupon);
        echo json_encode(['message' => 'Cupon actualizado']);
    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(['message' => $e->getMessage()]);
    }
    exit();
}

if ($_POST['METHOD'] == 'DELETE') {
    unset($_POST['METHOD']);
        $cuponModificar->eliminarCupon($_POST['IDCupon']);
        echo json_encode(['message' => 'Cupon eliminado']);

    exit();
}

header("HTTP/1.1 400 Bad Request");
echo json_encode(['message' => 'Invalid METHOD']);
?>