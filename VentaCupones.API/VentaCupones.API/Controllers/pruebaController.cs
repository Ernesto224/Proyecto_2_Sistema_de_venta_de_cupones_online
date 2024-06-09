using Microsoft.AspNetCore.Mvc;

// For more information on enabling Web API for empty projects, visit https://go.microsoft.com/fwlink/?LinkID=397860

namespace VentaCupones.API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class pruebaController : ControllerBase
    {
        // POST api/<pruebaController>
        [HttpPost]
        public void Post([FromBody] string value)
        {
        }
    }
}
