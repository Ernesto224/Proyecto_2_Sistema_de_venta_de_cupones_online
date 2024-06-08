using System;
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
    public class GestionarDetalleCompraBW : IGestionarDetalleCompraBW
    {
        private readonly IGestionarDetalleCompraDA gestionarDetalleCompraDA;

        public GestionarDetalleCompraBW(IGestionarDetalleCompraDA gestionarDetalleCompraDA)
        {
            this.gestionarDetalleCompraDA = gestionarDetalleCompraDA;
        }

        public async Task<bool> RegistrarDetalleCompra(DetalleCompra detalleCompra)
        {
            //se validan los campos del detalle de compra
            bool validacion = DetallesSonValidos.ValidarDetallesDeCompra(detalleCompra);

            if (!validacion)
            {
                return false;
            }

            //ejecuta el metodo para guardar los detalles de compra
            return await this.gestionarDetalleCompraDA.RegistrarDetalleCompra(detalleCompra);
        }
    }
}
