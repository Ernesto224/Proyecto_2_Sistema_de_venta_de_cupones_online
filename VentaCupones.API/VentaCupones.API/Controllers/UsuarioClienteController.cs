using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using VentaCupones.API.DTOs;
using VentaCupones.BC.Modelos;
using VentaCupones.BW.Interfaces.BW;
using VentaCuponesSQLServer.API.Utilitarios;

// For more information on enabling Web API for empty projects, visit https://go.microsoft.com/fwlink/?LinkID=397860

namespace VentaCuponesSQLServer.API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class UsuarioClienteController : ControllerBase
    {
        private readonly IGestionarUsuariosBW gestionarUsuariosBW;

        public UsuarioClienteController(IGestionarUsuariosBW gestionarUsuariosBW)
        {
            this.gestionarUsuariosBW = gestionarUsuariosBW;
        }

        // GET api/<UsuarioClienteController>/5
        [HttpGet("{correoElectronico}/{contrasenia}/")]
        public async Task<ActionResult<UsuarioClienteDTO>> IniciarSesion(string correoElectronico, string contrasenia)
        {
            var resultado = await this.gestionarUsuariosBW.IniciarSesion(correoElectronico, contrasenia);

            if (resultado == null)
            {
                return NotFound(resultado);
            }

            return Ok(UsuarioClienteMapper.MapToDTO(resultado));
        }

        // POST api/<UsuarioClienteController>
        [HttpPost]
        public async Task<ActionResult<bool>> RegistarUsuarioCliente(UsuarioClienteRegistroDTO usuarioNuevo)
        {
            if (usuarioNuevo == null)
            {
                return NotFound(false);
            }

            var resultado = await this.gestionarUsuariosBW.RegistarUsuarioCliente(UsuarioClienteMapper.MapToUsuario(usuarioNuevo));

            if (!resultado)
            {
                return NotFound(resultado);
            }

            return Ok(resultado);
        }
    }
}
