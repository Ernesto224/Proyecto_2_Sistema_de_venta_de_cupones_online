<?php
require_once "../Business/CuponModificar.php";
require_once "../Model/Cupon.php";

class CuponModificarController
{
    private $cuponModificar;

    public function __construct()
    {
        $this->cuponModificar = new CuponModificar();
    }

    public function handleRequest()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($data['METHOD'] == 'POST') {
                $cupon = new Cupon(
                    null,
                    $data['Nombre'],
                    $data['Imagen'],
                    $data['Ubicacion'],
                    $data['PrecioCuponBase'],
                    $data['PrecioCuponVenta'],
                    $data['FechaVencimientoOferta'],
                    $data['IDEmpresa'],
                    $data['Habilitado']
                );
                $id = $this->cuponModificar->registrarCupon($cupon);
                echo json_encode(['IDCupon' => $id]);
                exit();
            }

            if ($data['METHOD'] == 'PUT') {
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
                $this->cuponModificar->actualizarCupon($cupon);
                echo json_encode(['message' => 'Cupon actualizado']);
                exit();
            }

            if ($data['METHOD'] == 'DELETE') {
                $this->cuponModificar->eliminarCupon($data['IDCupon']);
                echo json_encode(['message' => 'Cupon eliminado']);
                exit();
            }
        }

        header("HTTP/1.1 400 Bad Request");
    }
}
?>
