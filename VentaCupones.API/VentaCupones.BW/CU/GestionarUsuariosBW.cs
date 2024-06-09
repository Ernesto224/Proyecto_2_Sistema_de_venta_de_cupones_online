using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BC.Modelos;
using VentaCupones.BC.ReglasDeNegocio;
using VentaCupones.BW.Interfaces.BW;
using VentaCupones.BW.Interfaces.DA;

namespace VentaCupones.BW.CU
{
    public class GestionarUsuariosBW : IGestionarUsuariosBW
    {
        private readonly IGestionarUsuariosDA gestionarUsuariosDA;

        public GestionarUsuariosBW(IGestionarUsuariosDA gestionarUsuariosDA)
        {
            this.gestionarUsuariosDA = gestionarUsuariosDA;
        }

        public async Task<UsuarioCliente> IniciarSesion(string correoElectronico, string contrasenia)
        {
            //se verifica que los campos ingresados cumplan con los requisitos
            bool validacion = UsuarioEsValido.ValidarCorreoElectronico(correoElectronico) 
                && UsuarioEsValido.ValidarContrasenia(contrasenia);

            if (validacion)
            {
                return await this.gestionarUsuariosDA.IniciarSesion(correoElectronico, contrasenia);
            }

            return null;
        }

        public async Task<bool> RegistarUsuarioCliente(UsuarioCliente usuarioNuevo)
        {
            //se validan los campos de infromacion del usuario
            bool validacion = UsuarioEsValido.ValidarUsuarioCliente(usuarioNuevo);

            if (validacion)
            {
                return await this.gestionarUsuariosDA.RegistarUsuarioCliente(usuarioNuevo);
            }

            return false;
        }
    }
}
