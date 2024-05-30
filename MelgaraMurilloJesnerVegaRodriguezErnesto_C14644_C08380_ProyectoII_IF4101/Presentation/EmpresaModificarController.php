<?php

// require_once '../Business/EmpresaModificar.php';
// require_once '../Model/Empresa.php';

// header('Access-Control-Allow-Origin: *');

// $empresaModificar = new EmpresaModificar();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $data = json_decode(file_get_contents("php://input"), true);

//     if (isset($data['METHOD'])) {
//         if ($data['METHOD'] == 'POST') {
//             // Validar y procesar inserción de empresa
//             if (validarDatosEmpresa($data)) {
//                 $empresa = new Empresa(
//                     null,
//                     $data['NombreEmpresa'],
//                     $data['DireccionFisica'],
//                     $data['CedulaFisicaJuridica'],
//                     $data['FechaCreacion'],
//                     $data['CorreoElectronico'],
//                     $data['Telefono'],
//                     $data['Contrasenia'],
//                     $data['Habilitado']
//                 );
//                 $id = $empresaModificar->registrarEmpresa($empresa);
//                 echo json_encode(['IDEmpresa' => $id]);
//                 header("HTTP/1.1 200 OK");
//                 exit();
//             } else {
//                 // Datos de empresa no válidos
//                 header("HTTP/1.1 400 Bad Request");
//                 exit();
//             }
//         } elseif ($data['METHOD'] == 'PUT') {
//             // Validar y procesar actualización de empresa
//             if (validarDatosEmpresa($data)) {
//                 $empresa = new Empresa(
//                     $data['IDEmpresa'],
//                     $data['NombreEmpresa'],
//                     $data['DireccionFisica'],
//                     $data['CedulaFisicaJuridica'],
//                     $data['FechaCreacion'],
//                     $data['CorreoElectronico'],
//                     $data['Telefono'],
//                     $data['Contrasenia'],
//                     $data['Habilitado']
//                 );
//                 $empresaModificar->actualizarEmpresa($empresa);
//                 echo json_encode(['message' => 'Empresa actualizada']);
//                 header("HTTP/1.1 200 OK");
//                 exit();
//             } else {
//                 // Datos de empresa no válidos
//                 header("HTTP/1.1 400 Bad Request");
//                 exit();
//             }
//         } elseif ($data['METHOD'] == 'DELETE') {
//             // Validar y procesar eliminación de empresa
//             if (isset($data['IDEmpresa'])) {
//                 $empresaModificar->eliminarEmpresa($data['IDEmpresa']);
//                 echo json_encode(['message' => 'Empresa eliminada']);
//                 header("HTTP/1.1 200 OK");
//                 exit();
//             } else {
//                 // ID de empresa no proporcionado
//                 header("HTTP/1.1 400 Bad Request");
//                 exit();
//             }
//         }
//     }
// }

// header("HTTP/1.1 400 Bad Request");
// function validarDatosEmpresa($data) {
//     // Verificar si los campos requeridos están presentes y no están vacíos
//     if (isset($data['NombreEmpresa']) && !empty($data['NombreEmpresa']) &&
//         isset($data['DireccionFisica']) && !empty($data['DireccionFisica']) &&
//         isset($data['CedulaFisicaJuridica']) && !empty($data['CedulaFisicaJuridica']) &&
//         isset($data['FechaCreacion']) && !empty($data['FechaCreacion']) &&
//         isset($data['CorreoElectronico']) && !empty($data['CorreoElectronico']) &&
//         isset($data['Telefono']) && !empty($data['Telefono']) &&
//         isset($data['Contrasenia']) && !empty($data['Contrasenia']) &&
//         isset($data['Habilitado'])) {
//         return true; // Los datos son válidos
//     } else {
//         return false; // Los datos son inválidos
//     }
// }
require_once '../Business/EmpresaModificar.php';
require_once '../Model/Empresa.php';

header('Access-Control-Allow-Origin: *');

$empresaModificar = new EmpresaModificar();

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
            $data['Habilitado']
        );
        $id = $empresaModificar->registrarEmpresa($empresa);
        echo json_encode(['IDEmpresa' => $id]);
        header("HTTP/1.1 200 OK");
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
            $data['Habilitado']
        );
        $empresaModificar->actualizarEmpresa($empresa);
        echo json_encode(['message' => 'Empresa actualizada']);
        header("HTTP/1.1 200 OK");
        exit();
    }

    if ($data['METHOD'] == 'DELETE') {
        $empresaModificar->eliminarEmpresa($data['IDEmpresa']);
        echo json_encode(['message' => 'Empresa eliminada']);
        header("HTTP/1.1 200 OK");
        exit();
    }
}

header("HTTP/1.1 400 Bad Request");

?> 


