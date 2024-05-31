using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Text.Json;
using System.Threading.Tasks;
using VentaCupones.BW.Interfaces.SG;
using VentaCupones.SG.Cliente;

namespace VentaCupones.SG.Servicios
{
    public class EmailJsServices : IServicioDeCorreo
    {
        private readonly ClienteHttp clienteHttp;

        public async Task<bool> EnviarCorreoDeConfirmacion(object infromacion)
        {
            return true;
        }
    }
}
