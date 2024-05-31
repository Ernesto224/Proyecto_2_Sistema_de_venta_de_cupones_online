<?php

require_once '../Business/UsuarioAdminLectura.php';
require_once '../Business/UsuarioAdminModificar.php';
require_once '../Model/UsuarioAdmin.php';
require_once '../Model/Empresa.php';
require_once '../Model/Cupon.php';

header('Access-Control-Allow-Origin: *');

$usuarioAdminLectura = new UsuarioAdminLectura();
$usuarioAdminModificar = new UsuarioAdminModificar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if ($data['METHOD'] == 'PUT' && isset($data['IDEmpresa'])) {
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
        $usuarioAdminModificar->actualizarInfoJuridicaEmpresa($empresa);
        echo json_encode(['message' => 'Información jurídica de la empresa actualizada']);
        header("HTTP/1.1 200 OK");
        exit();
    }
    
    if ($data['METHOD'] == 'PUT' && isset($data['IDCupon'])) {
        $cupon = new Cupon(
            $data['IDCupon'],
            $data['Nombre'],
            $data['Imagen'],
            $data['Ubicacion'],
            $data['PrecioCuponBase'],
            $data['PrecioCuponVenta'],
            $data['FechaVencimientoOferta'],
            $data['IDEmpresa'],
            $data['Habilitado'],
            $data['EnPromocion']
        );
        $usuarioAdminModificar->actualizarHabilitacionCupon($cupon);
        echo json_encode(['message' => 'Cupón actualizado']);
        header("HTTP/1.1 200 OK");
        exit();
    }
    
    header("HTTP/1.1 400 Bad Request");
}
?>
