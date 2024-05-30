using Microsoft.AspNetCore.Mvc;
using VentaCupones.API.Utilitarios;
using VentaCupones.BW.Interfaces.BW;
using VentaCupones.DA.Entidades;

// For more information on enabling Web API for empty projects, visit https://go.microsoft.com/fwlink/?LinkID=397860

namespace VentaCupones.API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class DetallesDeCompraController : ControllerBase
    {
        private readonly IGestionarDetalleCompraBW gestionarDetalleCompraBW;

        public DetallesDeCompraController(IGestionarDetalleCompraBW gestionarDetalleCompraBW)
        {
            this.gestionarDetalleCompraBW = gestionarDetalleCompraBW;
        }

        // POST api/<DetallesDeCompraController>
        [HttpPost]
        public async Task<ActionResult<bool>> RegistrarDetalleCompra(DetalleCompraRegistrarDTO detalleCompraRegistrarDTO)
        {
            //se valida imediatamente que el detalle no sea nullo
            if (detalleCompraRegistrarDTO == null)
            {
                return NotFound(false);
            }

            //se solicita el registro del detalle de compra
            var resultado = await this.gestionarDetalleCompraBW.RegistrarDetalleCompra(DetallesMapper.MapToModel(detalleCompraRegistrarDTO));

            //se verifica si este fue exitoso
            if (!resultado)
            {
                return NotFound(false);
            }

            return Ok(resultado);
        }

    }
}
