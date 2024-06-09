using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.Json;
using System.Threading.Tasks;
using VentaCupones.BC.Constantes;
using VentaCupones.BC.Modelos;
using VentaCupones.BW.Interfaces.SG;
using VentaCupones.SG.Cliente;

namespace VentaCupones.SG.Acciones
{
    public class GestionarCuponesSG : IGestionarCuponesSG
    {

        private readonly ClienteHttp clienteHttp;

        public GestionarCuponesSG(ClienteHttp clienteHttp)
        {
            this.clienteHttp = clienteHttp;
        }

        public async Task<IEnumerable<Cupon>> GestionarCupones(int idCategoria, string termino, int pagina)
        {

            try
            {

                //se realiza una solicitud de tipo get
                JsonElement json = await this.clienteHttp.SolicitudGet(APICuponesConexion.APICupones + "?categoria=" 
                    + idCategoria + "&termino=" + termino + "&pagina=" + pagina);

                //se crea una lista para almacenar el mapeo de los datos
                List<Cupon> cupones = new List<Cupon>();

                //se recorre el arreglo de tipo json resultante
                for (int i = 0; i < json.GetArrayLength(); i++)
                {
                    //se reliza un mapeo detallado de los datos
                    Cupon cupon = new Cupon()
                    {
                        IDCupon = json[i].GetProperty("IDCupon").GetInt32(),
                        Nombre = json[i].GetProperty("Nombre").GetString(),
                        Imagen = json[i].GetProperty("Imagen").GetString(),
                        Ubicacion = json[i].GetProperty("Ubicacion").GetString(),
                        PrecioCupon = json[i].GetProperty("PrecioCupon").GetDecimal(),
                        IDEmpresa = json[i].GetProperty("IDEmpresa").GetString(),
                        IDCategoria = json[i].GetProperty("IDCategoria").GetString(),
                        Descuento = (decimal)(json[i].GetProperty("Descuento").ValueKind == JsonValueKind.Null ? 
                            (decimal?)null : json[i].GetProperty("Descuento").GetDecimal())
                    };

                    cupones.Add(cupon);//se agrega el cupon a la lista
                }

                return cupones;

            }
            catch (Exception ex)
            {
                //captura en caso de un error en la solicitud
                Console.WriteLine(ex.ToString());
                return new List<Cupon>();
            }
        }
    }
}
