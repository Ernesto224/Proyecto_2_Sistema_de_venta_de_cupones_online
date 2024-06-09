using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BC.ReglasDeNegocio;
using VentaCupones.BW.Interfaces.BW;
using VentaCupones.BW.Interfaces.DA;
using VentaCupones.DA.Entidades;

namespace VentaCupones.BW.CU
{
    public class GestionarCompraBW : IGestionarCompraBW
    {
        private readonly IGestionarCompraDA gestionarCompraDA;

        public GestionarCompraBW(IGestionarCompraDA gestionarCompraDA)
        {
            this.gestionarCompraDA = gestionarCompraDA;
        }

        public async Task<IEnumerable> ObtenerCompras(int idUsuarioCliente)
        {
           bool validacion = CompraEsValida.ValidarID(idUsuarioCliente);

           //se valida que el id ingresado es valido
           if (!validacion) 
           {
                return Enumerable.Empty<Compra>();
           }

           return await this.gestionarCompraDA.ObtenerCompras(idUsuarioCliente);
        }

        public async Task<int> RegistrarCompra(Compra compraNueva)
        {
            bool validacion = CompraEsValida.ValidarCompra(compraNueva);

            //se valida que los campos de la compra sean validos
            if (!validacion)
            {
                return -1;
            }

            return await this.gestionarCompraDA.RegistrarCompra(compraNueva);
        }
    }
}
