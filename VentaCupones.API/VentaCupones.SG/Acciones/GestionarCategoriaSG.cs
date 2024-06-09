using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.Json;
using System.Threading.Tasks;
using VentaCupones.BC.Constantes;
using VentaCupones.BC.Modelos;
using VentaCupones.BW.Interfaces.BW;
using VentaCupones.BW.Interfaces.SG;
using VentaCupones.SG.Cliente;

namespace VentaCupones.SG.Acciones
{
    public class GestionarCategoriaSG : IGestionarCategoriaSG
    {
        private readonly ClienteHttp clienteHttp;

        public GestionarCategoriaSG(ClienteHttp clienteHttp)
        {
            this.clienteHttp = clienteHttp;
        }

        public async Task<IEnumerable> ObtenerCategorias()
        {
            JsonElement json = await this.clienteHttp.SolicitudGet(APICategoriaCuponesConexion.APICategoriasCupon);

            //se crea una lista para almacenar el mapeo de los datos
            List<CategoriaCupon> categorias = new List<CategoriaCupon>();

            //se recorre el arreglo de tipo json resultante
            for (int i = 0; i < json.GetArrayLength(); i++)
            {
                //se reliza un mapeo detallado de los datos
                CategoriaCupon categoria = new CategoriaCupon()
                {
                    IDCategoria = json[i].GetProperty("IDCategoria").GetInt32(),
                    Nombre = json[i].GetProperty("Nombre").GetString(),
                    Descripcion = json[i].GetProperty("Descripcion").GetString()  
                };

                categorias.Add(categoria);//se agrega la categoria a la lista
            }

            return categorias;

        }
    }
}
