<?php
header('Access-Control-Allow-Origin: *');
require_once "../Business/CategoriaCuponModificar.php";

$categoriaCuponModificar = new CategoriaCuponModificar();

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
        $categoriaCuponModificar->actualizarCategoria($categoriaCupon);
        echo json_encode(['message' => 'Cupon actualizado']);
    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(['message' => $e->getMessage()]);
    }
    exit();
}

header("HTTP/1.1 400 Bad Request");
echo json_encode(['message' => 'Invalid METHOD']);
?>
