<?php

require_once '../Business/UsuarioEmpresaModificar.php';
require_once '../Model/UsuarioEmpresa.php';
header('Access-Control-Allow-Origin: *');

// Verificar si el método de la solicitud es POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Decodificar los datos JSON enviados en la solicitud
    $data = json_decode(file_get_contents("php://input"), true);

    // Verificar si el método en los datos es "PUT"
    if($data['METHOD'] == 'PUT'){
        // Crear una instancia del negocio UsuarioEmpresaModificar
        $usuarioEmpresaModificar = new UsuarioEmpresaModificar();
        
        // Obtener la nueva contraseña y el ID del usuario de los datos
        $nuevaContrasenia = $data['nuevaContrasenia'];
        $idUsuario = $data['idUsuario'];

        // Llamar al método cambiarContrasenia del negocio para cambiar la contraseña
        $cambioExitoso = $usuarioEmpresaModificar->cambiarContrasenia($nuevaContrasenia, $idUsuario);

        // Verificar si el cambio fue exitoso
        if($cambioExitoso){
            // Enviar una respuesta JSON de éxito
            echo json_encode(['message' => 'Contraseña cambiada con éxito']);
            header("HTTP/1.1 200 OK");
        } else {
            // Enviar una respuesta JSON de error
            echo json_encode(['message' => 'Error al cambiar la contraseña']);
            header("HTTP/1.1 500 Internal Server Error");
        }
    } else {
        // Enviar una respuesta JSON de error si el método no es "PUT"
        echo json_encode(['message' => 'Método no permitido']);
        header("HTTP/1.1 405 Method Not Allowed");
    }
} else {
    // Enviar una respuesta JSON de error si el método no es POST
    echo json_encode(['message' => 'Método no permitido']);
    header("HTTP/1.1 405 Method Not Allowed");
}

?>
