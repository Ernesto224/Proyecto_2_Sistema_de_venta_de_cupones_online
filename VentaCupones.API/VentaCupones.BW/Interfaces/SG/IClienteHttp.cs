using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.Json;
using System.Threading.Tasks;

namespace VentaCupones.BW.Interfaces.SG
{
    public interface IClienteHttp
    {
        public Task<JsonElement> Solicitud(string Url);
    }
}
