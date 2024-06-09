using VentaCupones.API.DTOs;
using VentaCupones.BC.Modelos;

namespace VentaCuponesSQLServer.API.Utilitarios
{
    public static class UsuarioClienteMapper
    {
        public static UsuarioClienteDTO MapToDTO(UsuarioCliente usuarioCliente)
        {
            return new UsuarioClienteDTO
            {
                IDCliente = usuarioCliente.IDCliente,
                Nombre = usuarioCliente.Nombre,
                Apellidos = usuarioCliente.Apellidos,
                FechaDeNacimiento = usuarioCliente.FechaDeNacimiento,
                CorreoElectronico = usuarioCliente.CorreoElectronico
            };
        }

        public static UsuarioCliente MapToUsuario(UsuarioClienteRegistroDTO usuarioClienteRegistro)
        {
            return new UsuarioCliente
            {
                Nombre = usuarioClienteRegistro.Nombre,
                Apellidos = usuarioClienteRegistro.Apellidos,
                CedulaDeIdentidad = usuarioClienteRegistro. CedulaDeIdentidad,
                FechaDeNacimiento = usuarioClienteRegistro.FechaDeNacimiento,
                CorreoElectronico = usuarioClienteRegistro.CorreoElectronico,
                Contrasenia = usuarioClienteRegistro.Contrasenia,
            };
        }

        public static IEnumerable<UsuarioClienteDTO> MapToDTOList(IEnumerable<UsuarioCliente> usuariosClientes)
        {
            return usuariosClientes.Select(usuario => MapToDTO(usuario)).ToList();
        }
    }
}
