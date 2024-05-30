<?php
   require_once "../Data/UsuarioAdminLecturaData.php";
   class UsuarioAdminLectura{
        private $usuarioAdminData;
        public function __construct(){
            $this-> usuarioAdminData = new UsuarioAdminLecturaData();
        }
        public function obtenerTodasLasEmpresas(): ?array {
            try {
                return $this->usuarioAdminData->obtenerTodasLasEmpresas();
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
        }
        function obtenerCuponesEmpresa($idEmpresa){
            try {
                return $this->usuarioAdminData->obtenerCuponesEmpresa($idEmpresa);
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
        }
   }

?>