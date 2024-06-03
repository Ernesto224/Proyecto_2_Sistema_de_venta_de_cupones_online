<?php
require_once '../Business/EmpresaModificar.php';
require_once '../Model/Empresa.php';

header('Access-Control-Allow-Origin: *');
$empresaModificar = new EmpresaModificar();
<<<<<<< HEAD
        if ($_POST['METHOD'] == 'POST') {
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
                $_POST['Habilitado'],
                $_POST['CredencialesTemporales']
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
            $empresaModificar->actualizarEmpresa($empresa);
            echo json_encode(['message' => 'Empresa actualizada']);
            http_response_code(200);
            exit();
        }

        if ($_POST['METHOD'] == 'DELETE') {
            $empresaModificar->eliminarEmpresa($_GET['IDEmpresa']);
            echo json_encode(['message' => 'Empresa eliminada']);
            http_response_code(200);
            exit();
        }
    http_response_code(400);
    echo json_encode(['error' => 'Bad Request']);
?>
=======

if ($_POST['METHOD'] == 'POST') {
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
        $_POST['Habilitado'],
        $_POST['CredencialesTemporales']
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
    $empresaModificar->actualizarEmpresa($empresa);
    echo json_encode(['message' => 'Empresa actualizada']);
    http_response_code(200);
    exit();
}

if ($_POST['METHOD'] == 'DELETE') {
    $empresaModificar->eliminarEmpresa($_GET['IDEmpresa']);
    echo json_encode(['message' => 'Empresa eliminada']);
    http_response_code(200);
    exit();
}

http_response_code(400);
echo json_encode(['error' => 'Bad Request']);
?>
>>>>>>> 1f9730d78e7b85ae30b75eaec9ff5e643e2aef89
