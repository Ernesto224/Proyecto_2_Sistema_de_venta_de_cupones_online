using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.DA.Entidades;

namespace VentaCupones.BW.Interfaces.DA
{
    public interface IGestionarDetalleCompraDA
    {
        public Task<bool> RegistrarDetalleCompra(DetalleCompra detalleCompra);
    }
}
