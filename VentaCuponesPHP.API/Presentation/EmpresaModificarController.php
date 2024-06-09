<?php
require_once '../Business/EmpresaModificar.php';
require_once '../Model/Empresa.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$empresaModificar = new EmpresaModificar();

try {
    
    if ($_POST['METHOD'] == 'POST') {
        $Habilitado = (int) $_POST['Habilitado'];
        $CredencialesTemporales = (int)  $_POST['CredencialesTemporales'];
        $empresa = new Empresa(
            null,
            $_POST['NombreEmpresa'],
            $_POST['DireccionFisica'],
            $_POST['CedulaFisicaJuridica'],
            $_POST['FechaCreacion'],
            $_POST['CorreoElectronico'],
            $_POST['Telefono'],
            $_POST['NombreUsuario'],
            $_POST['Contrasenia'],
            $Habilitado,
            $CredencialesTemporales
        );
        $id = $empresaModificar->registrarEmpresa($empresa);
        echo json_encode(['IDEmpresa' => $id]);
        http_response_code(200);
        exit();
    }

    if ($_POST['METHOD'] == 'PUT') {
        $empresa = new Empresa(
            $_POST['IDEmpresa'],
            $_POST['NombreEmpresa'],
            $_POST['DireccionFisica'],
            $_POST['CedulaFisicaJuridica'],
            $_POST['FechaCreacion'],
            $_POST['CorreoElectronico'],
            $_POST['Telefono'],
            $_POST['NombreUsuario'],
            $_POST['Contrasenia'],
            $_POST['Habilitado'],
            $_POST['CredencialesTemporales']
        );
        $resultado = $empresaModificar->actualizarEmpresa($empresa);
        echo json_encode(['message' => $resultado]);
        http_response_code(200);
        exit();
    }

    if ($_POST['METHOD'] == 'PUT_CREDENCIALES') {
        $empresa = new Empresa(
            $_POST['IDEmpresa'],
            null,
            null,
            null,
            null,
            null,
            null,
            $_POST['NombreUsuario'],
            $_POST['Contrasenia'],
            null,
            $_POST['CredencialesTemporales']
        );
        $resultado = $empresaModificar->crearCredencialesTemporales($empresa);
        echo json_encode(['message' => $resultado]);
        http_response_code(200);
        exit();
    }

    if ($_POST['METHOD'] == 'DELETE') {
        $resultado = $empresaModificar->habilitarInabilitarEmpresa($_POST['IDEmpresa'], $_POST['Estado']);
        echo json_encode(['message' => $resultado]);
        http_response_code(200);
        exit();
    }

    http_response_code(400);
    echo json_encode(['error' => 'Método no permitido']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
}
?>