<?php
require_once '../Business/EmpresaLectura.php';
require_once '../Model/Empresa.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$empresaLectura = new EmpresaLectura();

try {
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {

            $empresa = $empresaLectura->obtenerEmpresaPorId($_GET['id']);
            if ($empresa) {
                echo json_encode($empresa);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Empresa no encontrada']);
            }
        } else if(isset($_GET['NombreUsuario'], $_GET['Contrasenia'])){

            $resultado = $empresaLectura->verificarInicioSesion($_GET['NombreUsuario'], $_GET['Contrasenia']);
            echo json_encode($resultado);
        } else if (isset($_GET['IdEmpresa'])) {

            $resultados = $empresaLectura->obtenerCuponesEmpresa($_GET['IdEmpresa']);
            if ($resultados) {
                echo json_encode($resultados);
                http_response_code(200);
                exit();
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Empresa no encontrada']);
                exit();
            }
        }else if (isset($_GET['IdEmpresaPromocion'])) {

            $resultados = $empresaLectura->obtenerPromocionesEmpresa($_GET['IdEmpresaPromocion']);
            if ($resultados) {
                echo json_encode($resultados);
                http_response_code(200);
                exit();
            }
        } else {
            
            $empresas = $empresaLectura->obtenerTodasLasEmpresas();
            echo json_encode($empresas);
        }
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
