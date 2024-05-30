<?php

require_once "../Business/CuponLectura.php";

class CuponLecturaController
{
    private $cuponLectura;

    public function __construct()
    {
        $this->cuponLectura = new CuponLectura();
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_GET['id'])) {
                $cupon = $this->cuponLectura->obtenerCuponPorId($_GET['id']);
                if ($cupon) {
                    echo json_encode($cupon);
                } else {
                    header("HTTP/1.1 404 Not Found");
                    exit();
                }
            } else {
                $cupones = $this->cuponLectura->obtenerTodosLosCupones();
                echo json_encode($cupones);
            }
            exit();
        }
        header("HTTP/1.1 400 Bad Request");
    }
}
?>
