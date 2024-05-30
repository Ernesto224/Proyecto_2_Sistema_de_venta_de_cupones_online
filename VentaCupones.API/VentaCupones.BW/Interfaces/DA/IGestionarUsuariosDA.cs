using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BC.Modelos;

namespace VentaCupones.BW.Interfaces.DA
{
    public interface IGestionarUsuariosDA
    {
        public Task<bool> RegistarUsuarioCliente(UsuarioCliente usuarioNuevo);

        public Task<UsuarioCliente> IniciarSesion(string correoElectronico, string contrasenia);
    }
}
