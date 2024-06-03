<?php

header('Access-Control-Allow-Origin: *');
require_once "../Business/CuponModificar.php";
require_once "../Model/Cupon.php";

<<<<<<< HEAD
$cuponModificar = new CuponModificar();

if ($_POST['METHOD'] == 'POST') {

=======
header('Access-Control-Allow-Origin: *');
$cuponModificar = new CuponModificar();

if ($_POST['METHOD'] == 'POST') {
    unset($_POST['METHOD']);
    try {
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
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
<<<<<<< HEAD
        http_response_code(200);

    exit();
}

if ($_POST['METHOD'] == 'PUT') {
=======
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
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
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
<<<<<<< HEAD
        http_response_code(200);
=======
    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(['message' => $e->getMessage()]);
    }
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
    exit();
}

if ($_POST['METHOD'] == 'DELETE') {
<<<<<<< HEAD
        $cuponModificar->eliminarCupon($_GET['IDCupon']);
        echo json_encode(['message' => 'Cupon eliminado']);
        http_response_code(200);

    exit();
}
header("HTTP/1.1 400 Bad Request");
echo json_encode(['Error' => 'Bad Request']);
exit();
?>
=======
    unset($_POST['METHOD']);
        $cuponModificar->eliminarCupon($_POST['IDCupon']);
        echo json_encode(['message' => 'Cupon eliminado']);

    exit();
}

header("HTTP/1.1 400 Bad Request");
echo json_encode(['message' => 'Invalid METHOD']);
?>
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
