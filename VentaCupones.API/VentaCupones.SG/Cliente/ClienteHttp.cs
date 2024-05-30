using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.Json;
using System.Threading.Tasks;
using VentaCupones.BW.Interfaces.SG;

namespace VentaCupones.SG.Cliente
{
    public class ClienteHttp : IClienteHttp
    {
        private readonly HttpClient httpClient;

        public ClienteHttp(HttpClient httpClient)
        {
            this.httpClient = httpClient;
        }

        public async Task<JsonElement> Solicitud(string Url)
        {

            try
            {
                HttpResponseMessage respuesta = await httpClient.GetAsync(Url);

                //se optiene la lectura de la respuesta resivida en un objeto string
                var stream = await respuesta.Content.ReadAsStreamAsync();

                JsonElement json = await JsonSerializer.DeserializeAsync<JsonElement>(stream);

                return json;
            }
            catch (Exception ex)
            {
                throw new HttpRequestException($"Error en {Url} al obtener el mensaje "+ ex);
            }

        }
    }
}
