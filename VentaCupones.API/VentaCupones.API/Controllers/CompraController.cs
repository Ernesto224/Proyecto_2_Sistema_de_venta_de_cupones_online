using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using Microsoft.IdentityModel.Tokens;
using VentaCupones.API.Utilitarios;
using VentaCupones.BW.Interfaces.BW;
using VentaCupones.DA.Entidades;

// For more information on enabling Web API for empty projects, visit https://go.microsoft.com/fwlink/?LinkID=397860

namespace VentaCupones.API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CompraController : ControllerBase
    {
        private readonly IGestionarCompraBW gestionarCompraBW;

        public CompraController(IGestionarCompraBW gestionarCompraBW)
        {
            this.gestionarCompraBW = gestionarCompraBW;
        }

        // GET api/<CompraController>/5
        [HttpGet("{idUsuarioCliente}")]
        public async Task<ActionResult<IEnumerable<CompraDTO>>> ObtenerCompras(int idUsuarioCliente)
        {
            var resultado = await this.gestionarCompraBW.ObtenerCompras(idUsuarioCliente);

            if (resultado.IsNullOrEmpty()) 
            {
                return NotFound(resultado);
            }

            return Ok(CompraMapper.MapToDTOs(resultado));
        }

        // POST api/<CompraController>
        [HttpPost]
        public async Task<ActionResult<int>> RegistrarCompra(CompraRegistroDTO compraRegistroDTO)
        {
            if (compraRegistroDTO == null)
            {
                return NotFound(-1);
            }

            //se ejecuta la operacion de gurdado
            var resultado = await this.gestionarCompraBW.RegistrarCompra(CompraMapper.MapToModel(compraRegistroDTO));

            if(resultado < 0)
            {
                return NotFound(resultado);
            }

            return Ok(resultado);
        }
    }
}
