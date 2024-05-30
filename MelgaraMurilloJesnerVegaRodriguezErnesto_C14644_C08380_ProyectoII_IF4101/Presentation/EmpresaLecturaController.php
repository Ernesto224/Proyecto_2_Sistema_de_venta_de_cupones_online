<?php
// Controlador para manejar las solicitudes GET para obtener información de empresas

// Incluir la clase de negocio EmpresaLectura y la clase de modelo Empresa
require_once '../Business/EmpresaLectura.php';
require_once '../Model/Empresa.php';

// Permitir solicitudes desde cualquier origen
header('Access-Control-Allow-Origin: *');

// Crear una instancia del objeto EmpresaLectura
$empresaLectura = new EmpresaLectura();

// Manejar las solicitudes GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si se proporciona un ID en la solicitud
    if (isset($_GET['id'])) {
        // Obtener una empresa por su ID
        $empresa = $empresaLectura->obtenerEmpresaPorId($_GET['id']);
        if ($empresa) {
            // Devolver la empresa encontrada en formato JSON
            echo json_encode($empresa);
        } else {
            // Devolver un código de respuesta 404 si la empresa no se encuentra
            header("HTTP/1.1 404 Not Found");
        }
    } else {
        // Obtener todas las empresas
        $empresas = $empresaLectura->obtenerTodasLasEmpresas();
        // Devolver todas las empresas en formato JSON
        echo json_encode($empresas);
    }
    // Devolver un código de respuesta 200 OK
    header("HTTP/1.1 200 OK");
    // Finalizar la ejecución del script
    exit();
}

// Devolver un código de respuesta 400 Bad Request si la solicitud no es GET
header("HTTP/1.1 400 Bad Request");
?>
