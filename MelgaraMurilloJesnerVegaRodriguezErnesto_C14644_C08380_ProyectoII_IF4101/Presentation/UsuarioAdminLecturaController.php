<?php

require_once '../Business/UsuarioAdminLectura.php';
require_once '../Model/UsuarioAdmin.php';
header('Access-Control-Allow-Origin: *');

$usuarioAdminLectura = new UsuarioAdminLectura();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        obtenerCuponesEmpresa($_GET['id']);
    } else {
        obtenerTodasLasEmpresas();
    }
}

function obtenerTodasLasEmpresas()
{
    global $usuarioAdminLectura;
    $empresas = $usuarioAdminLectura->obtenerTodasLasEmpresas();
    if ($empresas) {
        echo json_encode($empresas);
    } else {
        header("HTTP/1.1 404 Not Found");
    }
    header("HTTP/1.1 200 OK");
    exit();
}

function obtenerCuponesEmpresa($idEmpresa)
{
    global $usuarioAdminLectura;
    $cupones = $usuarioAdminLectura->obtenerCuponesEmpresa($idEmpresa);
    if ($cupones) {
        echo json_encode($cupones);
    } else {
        header("HTTP/1.1 404 Not Found");
    }
    header("HTTP/1.1 200 OK");
    exit();
}

?>
