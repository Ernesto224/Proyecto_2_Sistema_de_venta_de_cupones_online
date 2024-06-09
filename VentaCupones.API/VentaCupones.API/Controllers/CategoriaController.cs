using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using System.Collections;
using VentaCupones.BC.Modelos;
using VentaCupones.BW.Interfaces.BW;

// For more information on enabling Web API for empty projects, visit https://go.microsoft.com/fwlink/?LinkID=397860

namespace VentaCupones.API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CategoriaController : ControllerBase
    {
        private readonly IGestionarCategoriaBW gestionarCategoriaBW;

        public CategoriaController(IGestionarCategoriaBW gestionarCategoriaBW)
        {
            this.gestionarCategoriaBW = gestionarCategoriaBW;
        }

        // GET: api/<CategoriaController>
        [HttpGet]
        public async Task<ActionResult<IEnumerable<CategoriaCupon>>> ObtenerCategorias()
        {
            var resultado = await this.gestionarCategoriaBW.ObtenerCategorias();

            if (resultado == null)
            {
                return NotFound(resultado);
            }

            return Ok(resultado);
        }

    }
}
