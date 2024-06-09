<?php
require_once '../Business/PromocionModificar.php';
require_once '../Model/Promocion.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$promocionModificar = new PromocionModificar();

try {
    
    if ($_POST['METHOD'] == 'POST') {
        $HabilitadoAux =  (int) $_POST['Habilitado'];
        $promocion = new Promocion(
            null,
            $_POST['FechaDeInicio'],
            $_POST['FechaDeVencimiento'],
            $_POST['Descuento'],
            $_POST['IDEmpresa'],
            $_POST['IDCupon'],
           $HabilitadoAux
        );
        $id = $promocionModificar->registrarPromocion($promocion);
        echo json_encode(['IDPromocion' => $id]);
        http_response_code(200);
        exit();
    }

    if ($_POST['METHOD'] == 'PUT') {
        $promocion = new Promocion(
            $_POST['IDPromocion'],
            $_POST['FechaDeInicio'],
            $_POST['FechaDeVencimiento'],
            $_POST['Descuento'],
            $_POST['IDEmpresa'],
            $_POST['IDCupon'],
            $_POST['Habilitado']
        );
        $resultado = $promocionModificar->actualizarPromocion($promocion);
        echo json_encode(['message' => $resultado]);
        http_response_code(200);
        exit();
    }

    if ($_POST['METHOD'] == 'DELETE') {
        $estado = (int)$_POST['Estado'];
        $idPromocion = (int)$_POST['IDPromocion'];
        $resultado = $promocionModificar->eliminarPromocion($idPromocion,$estado);
        echo json_encode(['message' => $resultado]);
        http_response_code(200);
        exit();
    }
    
    http_response_code(400);
    echo json_encode(['error' => 'Bad Request']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
}
?>