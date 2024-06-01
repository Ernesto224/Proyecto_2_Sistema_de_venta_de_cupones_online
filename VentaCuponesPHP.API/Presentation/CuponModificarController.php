<?php

header('Access-Control-Allow-Origin: *');
require_once "../Business/CuponModificar.php";
require_once "../Model/Cupon.php";

$cuponModificar = new CuponModificar();

if ($_POST['METHOD'] == 'POST') {

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
        http_response_code(200);

    exit();
}

if ($_POST['METHOD'] == 'PUT') {
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
        http_response_code(200);
    exit();
}

if ($_POST['METHOD'] == 'DELETE') {
        $cuponModificar->eliminarCupon($_GET['IDCupon']);
        echo json_encode(['message' => 'Cupon eliminado']);
        http_response_code(200);

    exit();
}
header("HTTP/1.1 400 Bad Request");
echo json_encode(['Error' => 'Bad Request']);
exit();
?>
