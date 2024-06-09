using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.Json;
using System.Threading.Tasks;

namespace VentaCupones.SG.Cliente
{
    public class ClienteHttp
    {
        private readonly HttpClient httpClient;

        public ClienteHttp(HttpClient httpClient)
        {
            this.httpClient = httpClient;
        }

        public async Task<JsonElement> SolicitudGet(string ruta)
        {
            //se realiza la solicitud de tipo get
            HttpResponseMessage respuesta = await this.httpClient.GetAsync(ruta);

            if (!respuesta.IsSuccessStatusCode)
                throw new HttpRequestException($"Error en {ruta} al obtener el mensaje");

            //se optiene la lectura de la respuesta resivida en un objeto string
            var stream = await respuesta.Content.ReadAsStreamAsync();

            //se combierte el texto a un json serializado para poder ser leido
            JsonElement json = await JsonSerializer.DeserializeAsync<JsonElement>(stream);

            return json;
        }
    }
}
