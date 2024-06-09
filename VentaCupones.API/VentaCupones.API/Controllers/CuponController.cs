using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using Microsoft.IdentityModel.Tokens;
using VentaCupones.BC.LogicaDeNegocio;
using VentaCupones.BC.Modelos;
using VentaCupones.BW.Interfaces.BW;
using VentaCupones.BW.Interfaces.SG;

// For more information on enabling Web API for empty projects, visit https://go.microsoft.com/fwlink/?LinkID=397860

namespace VentaCupones.API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CuponController : ControllerBase
    {
        private readonly IGestionarCuponesBW gestionarCuponesBW;

        public CuponController(IGestionarCuponesBW gestionarCuponesBW)
        {
            this.gestionarCuponesBW = gestionarCuponesBW;
        }

        // GET: api/<CuponController>
        [HttpGet]
        public async Task<ActionResult<IEnumerable<Cupon>>> GestionarCupones(int idCategoria, string termino, int pagina)
        {
            var cupones = await this.gestionarCuponesBW.GestionarCupones(idCategoria, termino, pagina);

            if (cupones == null)
            {
                return NotFound(cupones);
            }

            return Ok(cupones);
        }
    }
}
