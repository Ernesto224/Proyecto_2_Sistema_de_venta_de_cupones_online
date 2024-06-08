using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BC.Modelos;
using VentaCupones.BW.Interfaces.DA;
using VentaCupones.DA.Contexto;
using VentaCupones.DA.Entidades;

namespace VentaCupones.DA.Acciones
{
    public class GestionarUsuariosDA : IGestionarUsuariosDA
    {
        private readonly ContextoVentaCupones contextoVentaCupones;

        public GestionarUsuariosDA(ContextoVentaCupones contextoVentaCupones)
        {
            this.contextoVentaCupones = contextoVentaCupones;
        }

        public async Task<UsuarioCliente> IniciarSesion(string correoElectronico, string contrasenia)
        {
            //se busca si el usuario que desea ingresar esta previamente registrado
            var usuarioDA = await this.contextoVentaCupones.usuarioClientes.FirstOrDefaultAsync(
                tupla => tupla.CorreoElectronico == correoElectronico 
                && tupla.Contrasenia == contrasenia);

            //se verifica que el usuario exista
            if (usuarioDA == null)
            {
                return null;
            }

            //si existe se retorna la informacion
            return new UsuarioCliente() {
                IDCliente = usuarioDA.IDCliente,
                Nombre = usuarioDA.Nombre,
                Apellidos = usuarioDA.Apellidos,
                CedulaDeIdentidad = usuarioDA.CedulaDeIdentidad,
                FechaDeNacimiento = usuarioDA.FechaDeNacimiento,
                CorreoElectronico = usuarioDA.CorreoElectronico,
                Contrasenia = usuarioDA.Contrasenia 
            };
        }

        public async Task<bool> RegistarUsuarioCliente(UsuarioCliente usuarioNuevo)
        {
            //se verifica que no exista un usuario con el mismo correo en la base de datos
            var usuarioDA = await this.contextoVentaCupones.usuarioClientes.FirstOrDefaultAsync(
                tupla => tupla.CorreoElectronico == usuarioNuevo.CorreoElectronico);

            //se verifica que el usuario exista
            if (usuarioDA != null)
            {
                return false;
            }

            //se crea una nueva entidad de base de datos
            usuarioDA = new UsuarioClienteDA() {
                Nombre = usuarioNuevo.Nombre,
                Apellidos = usuarioNuevo.Apellidos,
                CedulaDeIdentidad = usuarioNuevo.CedulaDeIdentidad,
                FechaDeNacimiento = usuarioNuevo.FechaDeNacimiento,
                CorreoElectronico = usuarioNuevo.CorreoElectronico,
                Contrasenia = usuarioNuevo.Contrasenia
            };

            //se agrega el objeto al contexto de base de datos
            await this.contextoVentaCupones.usuarioClientes.AddAsync(usuarioDA);

            //se escribe la informacion en la base de datos
            var resultadoOperacion = await this.contextoVentaCupones.SaveChangesAsync();

            if(resultadoOperacion > 0)
            {
                return true;
            }

            return false;
        }
    }
}
