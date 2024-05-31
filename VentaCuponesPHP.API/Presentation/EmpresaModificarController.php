<?php
require_once '../Business/EmpresaModificar.php';
require_once '../Model/Empresa.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

$empresaModificar = new EmpresaModificar();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        if ($data['METHOD'] == 'POST') {
            $empresa = new Empresa(
                null,
                $data['NombreEmpresa'],
                $data['DireccionFisica'],
                $data['CedulaFisicaJuridica'],
                $data['FechaCreacion'],
                $data['CorreoElectronico'],
                $data['Telefono'],
                $data['Contrasenia'],
                $data['Habilitado'],
                $data['CredencialesTemporales']
            );
            $id = $empresaModificar->registrarEmpresa($empresa);
            echo json_encode(['IDEmpresa' => $id]);
            http_response_code(200);
            exit();
        }

        if ($data['METHOD'] == 'PUT') {
            $empresa = new Empresa(
                $data['IDEmpresa'],
                $data['NombreEmpresa'],
                $data['DireccionFisica'],
                $data['CedulaFisicaJuridica'],
                $data['FechaCreacion'],
                $data['CorreoElectronico'],
                $data['Telefono'],
                $data['Contrasenia'],
                $data['Habilitado'],
                $data['CredencialesTemporales']
            );
            $empresaModificar->actualizarEmpresa($empresa);
            echo json_encode(['message' => 'Empresa actualizada']);
            http_response_code(200);
            exit();
        }

        if ($data['METHOD'] == 'DELETE') {
            $empresaModificar->eliminarEmpresa($data['IDEmpresa']);
            echo json_encode(['message' => 'Empresa eliminada']);
            http_response_code(200);
            exit();
        }
    }
    http_response_code(400);
    echo json_encode(['error' => 'Bad Request']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
}
?>